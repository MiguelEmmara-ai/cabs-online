<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DriverController extends Controller
{
    protected $agent;

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
        $this->agent = new Agent();

        return view('admin.table', [
            'title' => 'All Passengers Booking',
            "passengers" => $passengers,
            'agent' => $this->agent,
        ]);
    }

    public function showRecent(Passenger $Passengers)
    {
        $Passengers = Passenger::where('status', 'Unassigned')->orderBy('created_at', 'desc')->take(7)->paginate(7)->withQueryString();
        $this->agent = new Agent();

        return view('admin.table', [
            'title' => 'All Passengers Recent Booking',
            "passengers" => $Passengers,
            'agent' => $this->agent,
        ]);
    }

    public function showAvail(Passenger $Passengers)
    {
        $Passengers = Passenger::where('status', 'Unassigned')->paginate(7)->withQueryString();
        $this->agent = new Agent();

        return view('admin.table', [
            'title' => 'All Passengers Available Booking',
            "passengers" => $Passengers,
            'agent' => $this->agent,
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

    public function assign(Request $request)
    {
        Passenger::where('bookingRefNo', $request['bookingRefNo'])
            ->update([
                'status' => 'Assigned',
                'assignedBy' => auth()->user()->username,
            ]);

        // Variable To Pass
        $bookingRef = $request['bookingRefNo'];
        $driverName = auth()->user()->username;

        return redirect('/admin')->with('success', "Booking Reference $bookingRef <br> Has Been Assigned For $driverName");
    }

    public function assignBtn(Request $request)
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

    public function searchBtn(Request $request)
    {
        $exist = Passenger::select('bookingRefNo')
            ->where('bookingRefNo', $request->input('bookingInput'))
            ->first();
        $this->agent = new Agent();

        // If bookingInput is empty, we display status = Unassigned bookings
        if (!($request->input('bookingInput'))) {
            $Passengers = Passenger::where('status', 'Unassigned')
                ->orderBy('created_at', 'desc')
                ->take(7)
                ->paginate(7)
                ->withQueryString();

            return view('admin.table', [
                'title' => 'All Passengers Recent Booking',
                "passengers" => $Passengers,
                'agent' => $this->agent,
            ]);
        } else {
            // If bookingInput is NOT empty, we display the specific booking info
            if ($exist) {
                $Passengers = Passenger::where('bookingRefNo', $request->input('bookingInput'))
                    ->paginate(3)
                    ->withQueryString();

                return view('admin.table', [
                    'title' => 'All Passengers Recent Booking',
                    "passengers" => $Passengers,
                    'agent' => $this->agent,
                ]);
            } else {
                // If bookingInput is NOT empty, And not exist, we display error message
                return redirect('/admin')->with('unassignedError', 'This Booking Number Did Not Exist');
            }
        }
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
