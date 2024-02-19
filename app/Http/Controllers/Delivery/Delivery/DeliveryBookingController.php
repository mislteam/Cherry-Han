<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBooking;
use Illuminate\Http\Request;
use App\Services\LogWriter;
use App\Models\City;
use App\Models\DeliveryDetailOrder;

class DeliveryBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();        
        return view('frontend.calculate_delivery_charges',compact('cities')); 
    }

    public function add(Request $request)
    {
        $pid=$request->p_township;
        $city_id=$request->city_id;
        $weight=array($request->weight);
        $del_charges=array($request->del_charges);

        $cities=City::find($city_id);  
        $pickup_township=City::find($pid);  
        
        return view('frontend.deliverybooking.add',compact('cities','pickup_township','weight','del_charges')); 
    }

    public function addmore(Request $request)
    {
        
        $cities=City::all();  
        
        return view('frontend.deliverybooking.addmore',compact('cities')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'weight'          => ['required', 'string', 'max:255'],
            
        ]);

        $delivery_detail_order = DeliveryDetailOrder::create([
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
            'created_by' =>auth()->id(),          
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew delivery_detial: ".json_encode($delivery_detail_order);

        LogWriter::user_activity($activity,'Addingdeliverydatail');

        
        return redirect()->route('deliverydetailorderIndex');
        
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
     * @param  \App\Models\DeliveryBooking  $deliveryBooking
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryBooking $deliveryBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryBooking  $deliveryBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryBooking $deliveryBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryBooking  $deliveryBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryBooking $deliveryBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryBooking  $deliveryBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryBooking $deliveryBooking)
    {
        //
    }
}
