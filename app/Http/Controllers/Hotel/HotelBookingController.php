<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\HotelBooking;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = HotelBooking::all();
        return view('pages.hotel.booking', compact('lists'));
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
     * @param  \App\Models\HotelBooking  $hotelBooking
     * @return \Illuminate\Http\Response
     */
    public function show(HotelBooking $hotelBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelBooking  $hotelBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelBooking $hotelBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelBooking  $hotelBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelBooking $hotelBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelBooking  $hotelBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelBooking $hotelBooking)
    {
        //
    }
}
