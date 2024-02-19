<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarBooking;

class ApiCarBookingController extends ResponseController
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
    public function store(Request $request,$car_id)
    {
        
        $order_id=booking('car_bookings'); 
               
        $carbooking = CarBooking::create([
            'customer_name'       => $request->customer_name,
            'car_id'      => $car_id,
            'order_id'      => $order_id,
            'city_id'    => $request->city_id,
            'state_id'   => $request->state_id,
            'country_id'   => $request->country_id,
            'address'    => $request->address,
            'phone'   => $request->phone,
            'depature_date'   => date('Y-m-d',strtotime($request->depature_date)),
            'depature_time'   => date('H:i:s a',strtotime($request->depature_time)),
            'arrival_date'   => date('Y-m-d',strtotime($request->arrival_date)),
            'trip_type'   => $request->trip_type,
            'day_type'   => $request->day_type,
            'city_to'   => $request->city_to,
            'booking_by' => 0,
            'status' => '',           
            'note' => $request->note,           
        ]);

        return self::successResponse($carbooking);
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
        $carbooking = CarBooking::where('order_id',$request->order_id)
                                    ->where('booking_by',$request->user_id)
                                    ->firstOrFail();
        if($carbooking->delete()){
            return self::successResponse('booking cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }
    }
}
