/**
 * This function shows recent bookings (within 2 hours) by passing information to the server
 * @send XML object
 */
function showRecentHtml() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableID").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", 'includes/backend/getRecentBookHtml.php', true);
    xmlhttp.send();
}

/**
 * This function shows recent bookings (within 2 hours) by passing information to the server
 * @send XML object
 */
function showRecent() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableID").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", 'includes/backend/getRecentBook.php', true);
    xmlhttp.send();
}

/**
 * This function shows all bookings by passing information to the server
 * @send XML object
 */
function showall() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableID").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", 'includes/backend/getAllBook.php', true);
    xmlhttp.send();
}

/**
 * This function shows all available (Unassigned) Passengers by passing information to the server
 * @send XML object
 */
function shoAvailPassengers() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableID").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", 'includes/backend/getAvailBook.php', true);
    xmlhttp.send();
}

/**
 * This function shows all bookings by passing information to the server
 * @send XML object
 */
function showallHtml() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableID").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", 'includes/backend/getAllBookHtml.php', true);
    xmlhttp.send();
}

/**
 * This function shows all available (Unassigned) Passengers by passing information to the server
 * @send XML object
 */
function shoAvailPassengersHtml() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableID").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", 'includes/backend/getAvailBookHtml.php', true);
    xmlhttp.send();
}

/**
 * This function is to assign taxi to a booking number
 * @send XML object
 */
function updateAssignCab(bookingRefNo) {
    var xhttp = createRequest();

    if (bookingRefNo == "") {
        document.getElementById("tableID").innerHTML = "";
        return;
    }

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
        }
    };

    xhttp.open("GET", "includes/backend/assignCab.php?q=" + String(bookingRefNo), true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(null);
    window.location.reload();
}

/**
 * This function is to assign taxi to a booking number
 * @send XML object
 */
function updateAssignCabHtml(bookingRefNo) {
    var xhttp = createRequest();

    if (bookingRefNo == "") {
        $(document).ready(function() {

            swal({
                html: true,
                title: "Oh No...",
                text: "Please Fill The Booking Reference",
                icon: "error",
                button: "OK",
            })
        });
        return;
    }

    xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
        }
    };

    xhttp.open("GET", "includes/backend/assignCabHtml.php?q=" + String(bookingRefNo), true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(null);
    window.location.reload();
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