<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Passenger;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    public function showAll(Passenger $passengers)
    {
        $passengers = Passenger::paginate(7)->withQueryString();

        return view('admin.table', [
            'title' => 'All Passengers Booking',
            "passengers" => $passengers,
        ]);
    }

    public function showRecent(Passenger $Passengers)
    {
        $Passengers = Passenger::where('status', 'Unassigned')->orderBy('created_at', 'desc')->take(7)->paginate(7)->withQueryString();

        return view('admin.table', [
            'title' => 'All Passengers Recent Booking',
            "passengers" => $Passengers,
        ]);
    }

    public function showAvail(Passenger $Passengers)
    {
        $Passengers = Passenger::where('status', 'Unassigned')->paginate(7)->withQueryString();

        return view('admin.table', [
            'title' => 'All Passengers Available Booking',
            "passengers" => $Passengers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    public function assign(Request $request, Passenger $passenger)
    {
        Passenger::where('bookingRefNo', $request['bookingRefNo'])
            ->update([
                'status' => 'Assigned',
                'assignedBy' => auth()->user()->username,
            ]);

        return redirect('/admin')->with('success', 'Booking Has Been Assigned');
    }

    public function assignManual(Request $request, Passenger $passenger)
    {
        $validated = $request->validate([
            'bookingInput' => 'required',
        ]);

        // Check if bookingRefNo exist and Status its 'Unassigned'
        $exist = Passenger::select('bookingRefNo')
            ->where('bookingRefNo', $request->input('bookingInput'))
            ->first();

        if ($exist) {
            $isUnassigned = Passenger::select('bookingRefNo')
                ->where('bookingRefNo', $request->input('bookingInput'))
                ->where('status', 'Unassigned')
                ->first();

            if ($isUnassigned) {
                Passenger::where('bookingRefNo', $validated['bookingInput'])
                    ->update([
                        'status' => 'Assigned',
                        'assignedBy' => auth()->user()->username,
                    ]);

                return redirect('/admin')->with('success', 'Booking Has Been Assigned');
            }

            return redirect('/admin')->with('unassignedError', 'This Booking Has Been Assigned, Please Choose Another Passengers');

        }

        return redirect('/admin')->with('unassignedError', 'This Booking Number Did Not Exist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
