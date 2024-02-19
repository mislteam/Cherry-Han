<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BusTicketBooking;
use App\Models\BusTicket;

class BusTicketBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('bus-ticket-booking.show');

        // $countries = Country::where('status','=','active')->get();
        // $lists = BusTicketBooking::orderBy('id', 'desc')->get();
        $lists = [];
        // dd($lists);
        return view('pages.busticket.booking', compact('lists'));
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
     * @param  \App\Models\BusTicketBooking  $busTicketBooking
     * @return \Illuminate\Http\Response
     */
    public function show(BusTicketBooking $busTicketBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusTicketBooking  $busTicketBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(BusTicketBooking $busTicketBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusTicketBooking  $busTicketBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusTicketBooking $busTicketBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusTicketBooking  $busTicketBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusTicketBooking $busTicketBooking)
    {
        //
    }
}
