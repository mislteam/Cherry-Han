<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBooking;
use Illuminate\Http\Request;
use App\Services\LogWriter;
use App\Models\ApiUser;
use App\Models\City;
use App\Models\Banner;
use App\Models\Terms;
use App\Models\Language;
use App\Models\GeneralSetting;
use App\Models\PointSetting;
use App\Models\DeliveryCharges;
use App\Models\frontend\DeliveryDetailOrder;
use Illuminate\Support\Facades\DB;

class DeliveryBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::where('delivery_status','=','active')->get();     
        $deliverycity=DeliveryCharges::all();
        $banner=Banner::where('service_type','delivery_service')->first();
        $terms=Terms::where('service_type','delivery_service')->first();
        return view('frontend.calculate_delivery_charges',compact('cities','deliverycity','banner','terms')); 
    }
    public function deliverybooking()
    {
        abort_if_forbidden('delivery-service.show');
        $lists = DeliveryBooking::orderBy('id', 'desc')->get();
        $generalsetting = GeneralSetting::where('id',3)->get();

        return view('pages.delivery.delivery_booking',compact('lists','generalsetting')); 
    }
    public function deliverymessage()
    {
        abort_if_forbidden('delivery-message.show');
        $lists  = DB::table('languages')
                    ->where('word_id',701)
                    ->orwhere('word_id',702)
                    ->orwhere('word_id',703)
                    ->orwhere('word_id',704)
                    ->orwhere('word_id',705)
                    ->orwhere('word_id',706)
                    ->get();
        return view('pages.delivery.delivery_message',compact('lists')); 
    }

    public function deliverystatus($id,$status)
    { 
        abort_if_forbidden('delivery-service.edit');
        $deliverybooking=DeliveryBooking::find($id);
        $deliverybooking->status=$status;

        $info=json_decode($deliverybooking->status_info,true);
        //dd($info);
        $ind=count($info);
    
        $info[$ind]=$status;
        $deliverybooking->status_info=$info;

        $deliverybooking->save();

       // return json_encode($deliverybooking);

        return redirect()->route('deliveryservice');
    }
    
    public function deliverypoint11(Request $request,$user_id)
    {

        $user_id=$request->user_id;

        $general_id=$request->coin_id;
        $collected_point=$request->collected_point; 
        $coin_des=$request->coin_des; 

        $lists=GeneralSetting::find($general_id);
        $coin_type=$lists->name;

        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));

        $pointsetting = PointSetting::create([
            'user_id'     => $user_id,
            'coin_id'     => $general_id,
            'collected_point'     => $collected_point,
            'coin_type'   =>$coin_type,
            'coin_des'    =>$coin_des,
            'point_status'    =>"delivery",
            'coin_expire_date' =>$expiredate,
            'coin_status' =>0,
                  
        ]);
        //dd($pointsetting);exit;
        return redirect()->route('deliveryservice');

    }
    
    public function deliverypoint(Request $request,$id)
    {
        abort_if_forbidden('delivery-service.edit');
        $user_id=$request->user_id;

        $general_id=$request->coin_id;
        $collected_point=$request->collected_point; 
        $coin_des=$request->coin_des; 

        $lists=GeneralSetting::find($general_id);
        $coin_type=$lists->name;

        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));

        $pointsetting = PointSetting::create([
            'user_id'     => $user_id,
            'coin_id'     => $general_id,
            'collected_point'     => $collected_point,
            'coin_type'   =>$coin_type,
            'coin_des'    =>$coin_des,
            'use_point'    =>0,
            'point_status' =>"available",
            'coin_expire_date' =>$expiredate,
            'coin_status' =>0,
                  
        ]);
        //dd($pointsetting);exit;
        return redirect()->route('pointsettingIndex');

    }
   

    public function add(Request $request)
    {
        $pid=$request->p_township;
        $city_id=$request->city_id;
        $weight=array($request->weight);
        $del_charges=array($request->del_charges);

        $cities=City::find($city_id);  
        $pickup_township=City::find($pid);  
        $terms=Terms::where('service_type','delivery_service')->first();
        
        return view('frontend.deliverybooking.add',compact('cities','pickup_township','weight','del_charges','terms')); 
    }

    public function addmore(Request $request)
    {
        
        //$cities=City::all();  
        $cities = City::where('delivery_status','=','active')->get();     
        $deliverycity=DeliveryCharges::all();
        $terms=Terms::where('service_type','delivery_service')->first();

        return view('frontend.deliverybooking.addmore',compact('cities','terms','deliverycity')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'sender_name'          => ['required', 'string', 'max:255'],
            'weight'          => ['required', 'string', 'max:255'],
            
        ]);

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
    
    public function view($id)
    {
        abort_if_forbidden('delivery-service.show');
        $deliveryservices=DeliveryBooking::find($id);
       
        return view('pages.delivery.view',compact('deliveryservices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryBooking  $deliveryBooking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if_forbidden('delivery-service.edit');
        $cities = City::where('delivery_status','=','active')->get();     
        $deliverycity=DeliveryCharges::all();
        $deliveryservices=DeliveryBooking::find($id);
       
        return view('pages.delivery.edit',compact('deliveryservices','cities','deliverycity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryBooking  $deliveryBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        abort_if_forbidden('delivery-service.edit');

        $this->validate($request,[
            'sender_name' => ['required', 'string', 'max:255'],
     
        ]);
 
        $deliverybooking = DeliveryBooking::find($id);
       
        $before = $deliverybooking;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates delivery booking: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $deliverybooking->fill($request->all());
        $deliverybooking->save();
        //dd($deliverybooking);exit;

        $afterCat = $deliverybooking;
        $activity .="\nAfter updates deliverybooking: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingdeliverybooking');

        if (auth()->user()->can('deliverybooking.edit'))
            return redirect()->route('deliveryservice');
        else
            return redirect()->route('home');
        
    }

     public function getdeliveryweight($city_id)
    {
        //$city_id = $request->city_id;
         $data = DB::table('delivery_charges')
            ->where('city_id',$city_id)
            ->get();
        echo json_encode($data);   
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
