<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusTicketBooking;

class ApiBusTicketBookingController extends ResponseController
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
    public function store(Request $request,$busticket_id)
    {
        $order_id=booking('bus_ticket_bookings'); 
               
        $busticketbooking = BusTicketBooking::create([
            'name'       => $request->name,
            'busticket_id'      => $busticket_id,
            'order_id'      => $order_id,
            'from_id'    => $request->from_id,
            'to_id'    => $request->to_id,
            'phone'    => $request->phone,
            'email'   => $request->email,
            'depature_date' => date('Y-m-d',strtotime($request->depature_date)),
            'no_of_seat'   => $request->no_of_seat,
            'booking_by' => 0,
            'status' => '',           
            'note' => $request->note,           
        ]);

        return self::successResponse($busticketbooking);
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
        
        $BusTicketBooking = BusTicketBooking::where('order_id',$request->order_id)
                                            ->where('booking_by',$request->user_id)->firstOrFail();
        if($BusTicketBooking->delete()){
            return self::successResponse('booking cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }  
    }
}
