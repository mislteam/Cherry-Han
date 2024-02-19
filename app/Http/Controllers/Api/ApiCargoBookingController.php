<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CargoBooking;

class ApiCargoBookingController extends ResponseController
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
    public function store(Request $request,$cargo_id)
    {
        $order_id = booking('cargo_bookings'); 
    
        $cargobooking = CargoBooking::create([
            'customer_name'       => $request->customer_name,
            'cargo_id'      => $cargo_id,
            'order_id'      => $order_id,
            'start_place'    => $request->start_place,
            'end_place'    => $request->end_place,
            'phone'    => $request->phone,
            'depature_date' => date('Y-m-d',strtotime($request->depature_date)),
            'booking_by' => 0,
            'status' => '',           
            'note' => $request->note,           
        ]);

        return self::successResponse($cargobooking);
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
        $cargobooking = CargoBooking::where('order_id',$request->order_id)
                                    ->where('booking_by',$request->user_id)
                                    ->firstOrFail();
        if($cargobooking->delete()){
            return self::successResponse('booking cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }
    }
}
