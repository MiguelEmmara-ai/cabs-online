<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use Illuminate\Http\Request;

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
            'title' => 'Book A Cab',
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
        $validated = $request->validate([
            'fName' => 'required|min:3|max:255|',
            'lName' => 'required|min:3|max:255|',
            'phoneNumber' => 'required|digits_between:3,10|',
            'unitNumber' => 'required|numeric',
            'streetNumber' => 'required|numeric',
            'streetName' => 'required|min:3|max:255|',
            'suburb' => 'required|min:3|max:255|',
            'destinationSuburb' => 'required|min:3|max:255|',
            'pickUpDate' => 'required|date',
            'pickUpTime' => 'required|date_format:H:i',
            'carsNeed' => 'required',
        ]);

        $validated['customerName'] = $request->input('fName') . ' ' . $request->input('lName');

        $digits = 5;
        $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        $validated['bookingRefNo'] = $referenceNumber;

        $validated['status'] = 'Unassigned';

        $validated['assignedBy'] = 'None';

        Passenger::create($validated);

        return redirect('/booking')
            ->with('success', 'Your Booking Is Underway!');

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
}
