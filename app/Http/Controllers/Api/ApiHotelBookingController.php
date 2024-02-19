<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelBooking;

class ApiHotelBookingController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel=Hotel::all();
        return self::successResponse($hotel);
    }
    
    public function roomtype($hotel_id)
    {
        $roomtypes=HotelRoomType::where('hotel_id',$hotel_id)->get();
        return self::successResponse($roomtypes);

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
    public function store(Request $request,$hotel_id)
    {
        $order_id=booking('hotel_bookings');  
               
        $hotelbooking = HotelBooking::create([
            'name'       => $request->name,
            'hotel_id'      => $hotel_id,
            'order_id'      => $order_id,
            'phone'    => $request->phone,
            'email'   => $request->email,
            'address'    => $request->address,
            'checkin_date'   => date('Y-m-d',strtotime($request->checkin_date)),
            'checkout_date'   => date('Y-m-d',strtotime($request->checkout_date)),
            'room_type_id'   => $request->room_type_id,
            'room_type_name'   => $request->room_type_name,
            'room_type_price'   => $request->room_type_price,
            'no_room'   => $request->no_room,
            'no_person'   => $request->no_person,
            'booking_by' => 0,
            'status' => '',           
            'note' => $request->note,           
        ]);

        return self::successResponse($hotelbooking);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
        return self::successResponse($hotel);
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
         $hotelbooking = HotelBooking::where('order_id',$request->order_id)
                                    ->where('booking_by',$request->user_id)
                                    ->firstOrFail();
        if($hotelbooking->delete()){
            return self::successResponse('booking cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }
    }
}
