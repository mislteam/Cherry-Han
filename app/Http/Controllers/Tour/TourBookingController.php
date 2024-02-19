<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Models\TourBooking;
use Illuminate\Http\Request;

class TourBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = TourBooking::all();
        return view('pages.tour.booking', compact(['lists']));
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
     * @param  \App\Models\TourBooking  $tourBooking
     * @return \Illuminate\Http\Response
     */
    public function show(TourBooking $tourBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourBooking  $tourBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(TourBooking $tourBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourBooking  $tourBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourBooking $tourBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourBooking  $tourBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourBooking $tourBooking)
    {
        //
    }
}
