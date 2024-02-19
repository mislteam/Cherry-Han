<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourBooking;

class ApiTourBookingController extends ResponseController
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
    public function store(Request $request,$tour_id)
    {
         $order_id=booking('tour_bookings'); 
               
        $tourbooking = TourBooking::create([
            'name'       => $request->name,
            'tour_id'      => $tour_id,
            'order_id'      => $order_id,
            'phone'    => $request->phone,
            'email'   => $request->email,
            'address'    => $request->address,
            'depature_date'   => date('Y-m-d',strtotime($request->depature_date)),
            'depature_time'   => date('H:i:s a',strtotime($request->depature_time)),
            'no_pessenger'   => $request->no_pessenger,
            'booking_by' => 0,
            'status' => '',           
            'note' => $request->note,           
        ]);

        return self::successResponse($tourbooking);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $tourbooking = TourBooking::where('order_id',$request->order_id)
                                    ->where('booking_by',$request->user_id)
                                    ->firstOrFail();
        if($tourbooking->delete()){
            return self::successResponse('booking cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }
    }
}
