<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking.index', [
            'title' => 'Book A Cab | Cabs Online',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save ses from continue-booking, could be use to save all data
        $request->session()->save();

        $validated = $request->validate([
            'fName' => 'required|min:3|max:255|',
            'lName' => 'required|min:3|max:255|',
            'phoneNumber' => 'required|digits_between:3,10|',
            'unitNumber' => 'required|numeric',
            'streetNumber' => 'required|numeric',
            'streetName' => 'required|min:3|max:255|',
            'suburb' => 'required|min:3|max:255|',
            'destinationSuburb' => 'required|min:3|max:255|',
            'pickUpDate' => 'required|date|after_or_equal:today',
            'pickUpTime' => 'required|date_format:H:i|',
            'carsNeed' => 'required',
        ]);

        $validated['customerName'] = $request->input('fName') . ' ' . $request->input('lName');

        $digits = 5;
        $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $validated['bookingRefNo'] = $referenceNumber;

        $validated['status'] = 'Unassigned';

        $validated['assignedBy'] = 'None';

        Passenger::create($validated);

        // Clear
        $request->session()->pull('sbname', $request['sbname']);
        $request->session()->pull('dsbname', $request['dsbname']);
        $request->session()->pull('phone', $request['phone']);
        $request->session()->pull('pickUpDate', $request['pickUpDate']);
        $request->session()->pull('carsNeed', $request['carsNeed']);

        // Variable To Pass
        $pickUpDate = $validated['pickUpDate'];
        $pickUpTime = $validated['pickUpTime'];

        return redirect('/booking')
            ->with('success', "Your Booking Is Underway! <br><br> Booking Reference: $referenceNumber <br> Pick Up Date: $pickUpDate <br> Pick Up Time: $pickUpTime");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passengers  $passengers
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passengers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passengers  $passengers
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passengers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Passengers  $passengers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passengers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passengers  $passengers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passengers)
    {
        //
    }

    /**
     * Continue booking from home page
     *
     */
    public function continueBooking(Request $request)
    {
        $request->session()->put('sbname', $request['sbname']);
        $request->session()->put('dsbname', $request['dsbname']);
        $request->session()->put('phone', $request['phone']);
        $request->session()->put('pickUpDate', $request['pickUpDate']);
        $request->session()->put('carsNeed', $request['carsNeed']);

        return view('booking.index', [
            'title' => 'Book A Cab | Cabs Online',
        ]);
    }

    /**
     * Cancel booking, clear all session
     *
     */
    public function cancelBooking(Request $request)
    {
        // Clear
        $request->session()->pull('sbname', $request['sbname']);
        $request->session()->pull('dsbname', $request['dsbname']);
        $request->session()->pull('phone', $request['phone']);
        $request->session()->pull('pickUpDate', $request['pickUpDate']);
        $request->session()->pull('carsNeed', $request['carsNeed']);

        return redirect('/booking')->with('cancelSuccess', 'Your Booking Has Been Canceled!');
    }
}
