<?php

namespace App\Http\Livewire;

use App\Models\Passenger;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class BookingsComponent extends Component
{
    public $allBooking = false;
    public $recentBooking = false;
    public $allAvailBooking = false;

    protected $agent;

    public function render()
    {
        // All Bookings
        $allBookings = Passenger::paginate(7)->withQueryString();

        // Recent Bookings
        $recentBookings = Passenger::where('status', 'Unassigned')->orderBy('created_at', 'desc')->take(7)->paginate(7)->withQueryString();

        // All Available Bookings
        $allAvailBookings = Passenger::where('status', 'Unassigned')->paginate(7)->withQueryString();

        // Agent Devices
        $this->agent = new Agent();

        return view('admin.livewire.bookings-component', [
            'title' => 'All Passengers Booking',
            "allBookings" => $allBookings,
            "recentBookings" => $recentBookings,
            "allAvailBookings" => $allAvailBookings,
            'agent' => $this->agent,
        ]);
    }

    public function allBookingDiv()
    {
        $this->allBooking =! $this->allBooking;

        // Set Others Off
        $this-> recentBooking = false;
        $this->allAvailBooking = false;
    }

    public function recentBookingDiv()
    {
        $this->recentBooking =! $this->recentBooking;

        // Set Others Off
        $this->allBooking = false;
        $this->allAvailBooking = false;
    }

    public function allAvailBookingDiv()
    {
        $this->allAvailBooking =! $this->allAvailBooking;

        // Set Others Off
        $this->allBooking = false;
        $this->recentBooking = false;
    }
}
