<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryBooking;
use App\Models\frontend\DeliveryDetailOrder;


class ApiDeliveryBookingController extends ResponseController
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
    public function store(Request $request)
    {
       
        $randomUser = DB::table('api_users')
                ->inRandomOrder()
                ->first();

        $user_id=$randomUser->id;

        $delivery_detail_order = DeliveryDetailOrder::create([
            'user_id'          => $user_id,
            'sender_name'          => $request->sender_name,
            'sender_phone'          => $request->sender_phone,
            'receiver_name'      => $request->receiver_name,
            'receiver_phone'      => $request->receiver_phone,
            'pickup_township'      => $request->pickup_township,
            'delivery_township'      => $request->delivery_township,
            'weight'      => $request->weight,
            'del_charges'      => $request->del_charges,
            'detail_address'      => $request->detail_address,
            'note'      => $request->note, 
            'created_by' => rand(1,999),        
        ]);

        return self::successResponse($delivery_detail_order);

    }

    public function deliverydetailorder($user_id)
    {
        $orderdetails=DeliveryDetailOrder::where('user_id',$user_id)->get();
        return self::successResponse($orderdetails);
        //return $user_id;
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
    public function destroy($id)
    {
        $delivery_detail_order = DeliveryDetailOrder::find($id);
        if($delivery_detail_order->delete()){
            return self::successResponse('order cancelled successfully');
        }else{
            return self::errorResponse('something wrong');
        }
    }
}
