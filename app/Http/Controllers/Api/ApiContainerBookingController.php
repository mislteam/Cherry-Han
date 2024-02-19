<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContainerBooking;

class ApiContainerBookingController extends ResponseController
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
    public function store(Request $request,$container_id)
    {
        $order_id=booking('container_bookings');  
               
        $containerbooking = ContainerBooking::create([
            'customer_name'       => $request->customer_name,
            'container_id'      => $container_id,
            'order_id'      => $order_id,
            'from_place'    => $request->from_place,
            'to_place'   => $request->to_place,
            'way_type'   => $request->way_type,
            'no_way'   => $request->no_way,
            'price'   => $request->price,
            'address'    => $request->address,
            'phone'   => $request->phone,
            'depature_date'   => date('Y-m-d',strtotime($request->depature_date)),
            'pickup_time'   => date('H:i:s a',strtotime($request->pickup_time)),
            'from_city'   => $request->from_city,
            'to_city'   => $request->to_city,
            'booking_by' => 0,
            'status' => '',           
            'note' => $request->note,           
        ]);

        return self::successResponse($containerbooking);
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
        $containerbooking = ContainerBooking::where('order_id',$request->order_id)
                                            ->where('booking_by',$request->user_id)
                                            ->firstOrFail();
        if($containerbooking->delete()){
            return self::successResponse('booking cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }
    }
}
