/** 
 * // TODO
 * @returns XML object
 */
function addBooking() {
    var xhr = createRequest();

    if (xhr) {
        var fName = document.getElementById("fName").value;
        var lName = document.getElementById("lName").value;
        var customerName = fName + " " + lName;

        // generate booking date/time
        // get client's current date/time for booking date & booking time
        var currentDate = new Date();
        var dd = String(currentDate.getDate()).padStart(2, '0');
        var mm = String(currentDate.getMonth() + 1).padStart(2, '0');
        var yyyy = currentDate.getFullYear();
        var bookingDate = yyyy + '-' + mm + '-' + dd; // formatted this way because MySQL uses yyyy-mm-dd format

        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var bookingTime = hours + ':' + minutes + ':' + seconds; // formated this way because MySQL uses HH:MM:SS format

        var phone = document.getElementById("phone").value;
        var unumber = document.getElementById("unumber").value;
        var snumber = document.getElementById("snumber").value;
        var stname = document.getElementById("stname").value;
        var sbname = document.getElementById("sbname").value;
        var dsbname = document.getElementById("dsbname").value;
        var pickUpDate = document.getElementById("pickUpDate").value;
        var pickUpTime = document.getElementById("pickUpTime").value;

        var validated = false;

        // validate if pickupTime & pickupDate is not before current date & current time
        if (pickUpDate == bookingDate) { // validate if pickupDate is today

            if (validateTime(pickUpTime, bookingTime)) { // then check if time is not before current time

                validated = true;
            }

        } else if (validateDate(pickUpDate, bookingDate)) { // if pickupDate is after today

            validated = true;
        }

        if (validated) {

            // encodeURIComponent(bookingDate)
            var url = "includes/backend/booking.php";
            var params = "customerName=" + customerName +
                "&bookingDate=" + encodeURIComponent(bookingDate) +
                "&bookingTime=" + encodeURIComponent(bookingTime) +
                "&phone=" + encodeURIComponent(phone) +
                "&unumber=" + encodeURIComponent(unumber) +
                "&snumber=" + encodeURIComponent(snumber) +
                "&stname=" + encodeURIComponent(stname) +
                "&sbname=" + encodeURIComponent(sbname) +
                "&dsbname=" + encodeURIComponent(dsbname) +
                "&pickUpDate=" + encodeURIComponent(pickUpDate) +
                "&pickUpTime=" + encodeURIComponent(pickUpTime);

            xhr.open("POST", url, true);

            // Send the proper header information along with the request
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() { // Call a function when the state changes.
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    // resetForm();
                }
            }
            xhr.send(params);

        } else {
            $(document).ready(function() {
                swal({
                    html: true,
                    title: "Oh No...",
                    text: "Something is wrong buddy",
                    icon: "error",
                    button: "OK",
                }).then(function() {
                    window.location.href = "booking.html";
                })
            });
        }
    }
}

function validateDate(date, todaysdate) {
    if (date < todaysdate) {
        $(document).ready(function() {
            swal({
                html: true,
                title: "Oh No...",
                text: "Something is wrong buddy",
                icon: "error",
                button: "OK",
            }).then(function() {
                window.location.href = "booking.html";
            })
        });
        return false;
    }
    return true;
}

function validateTime(inputTime, currentTime) {
    if (inputTime < currentTime) {
        $(document).ready(function() {
            swal({
                html: true,
                title: "Oh No...",
                text: "Something is wrong buddy",
                icon: "error",
                button: "OK",
            }).then(function() {
                window.location.href = "booking.html";
            })
        });
        return false;
    }
    return true;
}

/**
 * Initialize XML 
 * @returns XML object
 */
function createRequest() {
    var xhr = false;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        // code for IE6, IE5
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhr;
} // end function createRequest()