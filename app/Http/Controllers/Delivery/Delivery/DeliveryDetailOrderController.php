<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryDetailOrder;
use App\Services\LogWriter;
use App\Models\ReceiveOrder;
use Illuminate\Support\Facades\DB;

class DeliveryDetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id=auth()->id();
        $orderdetails=DeliveryDetailOrder::where('created_by',$user_id)->get();  
        return view('frontend.deliverybooking.delivery_detail_orders',compact('orderdetails')); 
    }

    public function receiveorderindex()
    {
        //
        $orderdetails=ReceiveOrder::all();  
        return view('frontend.deliverybooking.receive_orders',compact('orderdetails')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function receiveordercreate(Request $request)
    {
        // 
        $oid=$request->id;
        $count=count($request->sender_name);
       
        for($i=0;$i<$count;$i++){
           
    
            $order=array(
                'sender_name'   => $request->sender_name[$i],          
                'sender_phone'  => $request->sender_phone[$i],          
                'receiver_name' => $request->receiver_name[$i],    

                'receiver_phone'   => $request->receiver_phone[$i],  
                'pickup_township'   => $request->pickup_township[$i],
                'delivery_township'   => $request->delivery_township[$i],
                'weight'   => $request->weight[$i],
                'del_charges'   => $request->del_charges[$i],
                'detail_address'   => $request->detail_address[$i],
                'note'   => $request->note[$i],
                'created_by' =>auth()->id(),

            );

            $delete=DB::table('delivery_detail_orders')->where('id', $request->id[$i])->delete();
          
           $receiveorder = ReceiveOrder::create($order);
        } 
         $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Receive Order: ".json_encode($receiveorder);

        LogWriter::user_activity($activity,'Addingreceiveorder');

        return redirect()->route('receiveorderIndex');
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
        $detail=DeliveryDetailOrder::find($id);
        $detail->delete();
        return redirect()->route('deliverydetailorderIndex');
    }
}
