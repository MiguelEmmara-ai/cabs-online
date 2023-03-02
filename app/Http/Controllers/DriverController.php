<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;

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
        $timezone = $this->getTimezone(); // Get the client's timezone

        $Passengers = Passenger::where('status', 'Unassigned')
            ->where('created_at', '>=', now()->subDay()->setTimezone($timezone)) // Filter by last 24 hours in client's timezone
            ->orderBy('created_at', 'desc')
            ->paginate(7)
            ->withQueryString();

        $this->agent = new Agent();

        return view('admin.table', [
            'title' => 'Available Passengers in Last 24 Hours',
            "passengers" => $Passengers,
            'agent' => $this->agent,
        ]);
    }

    private function getTimezone()
    {
        // Get the client's timezone using JavaScript
        // or any other method suitable for your application
        return 'UTC'; // Replace with the actual client's timezone
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

        // Define the time zone to be used
        date_default_timezone_set('Pacific/Auckland');

        // Set pickup date and time
        $pickup_date = Carbon::parse($request->input('pickupDate'))->format('Y-m-d');
        $pickup_time = Carbon::parse($request->input('pickupTime'))->format('H:i:s');
        $pickup_datetime = Carbon::parse($pickup_date . ' ' . $pickup_time);

        // Set the current time and 2 hours from now
        $current_time = Carbon::now();
        $pickup_time_within_2_hours = $current_time->copy()->addHours(2);

        if (!$request->input('bookingInput')) {
            // If bookingInput is empty, display unassigned bookings with pickup time within 2 hours
            $passengers = Passenger::where('status', 'Unassigned')
                ->where('pickupDate', '=', $pickup_date)
                ->where('pickupTime', '>=', $current_time->format('H:i:s'))
                ->where('pickupTime', '<=', $pickup_time_within_2_hours->format('H:i:s'))
                ->orderBy('pickupTime', 'asc')
                ->take(7)
                ->paginate(7)
                ->withQueryString();

            return view('admin.table', [
                'title' => 'All Passengers Recent Booking',
                'passengers' => $passengers,
                'agent' => $this->agent,
            ]);
        } elseif ($exist) {
            // If bookingInput is NOT empty, display the specific booking info
            $passengers = Passenger::where('bookingRefNo', $request->input('bookingInput'))
                ->paginate(3)
                ->withQueryString();

            return view('admin.table', [
                'title' => 'All Passengers Recent Booking',
                'passengers' => $passengers,
                'agent' => $this->agent,
            ]);
        } else {
            // If bookingInput is NOT empty, and not exist, display error message
            return redirect('/admin')->with('unassignedError', 'This Booking Number Did Not Exist');
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
