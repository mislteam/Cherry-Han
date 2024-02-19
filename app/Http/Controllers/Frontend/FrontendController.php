<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Cargo;
use App\Models\Container;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\BusTicket;
use App\Models\City;
use App\Models\State;
use App\Models\HotelRoomType;
use App\Models\TourItineary;
use App\Models\TourDestination;
use App\Models\TourDestinationPlace;
use Illuminate\Support\Facades\DB;
use App\Services\LogWriter;
use App\Models\ApiUser;
use App\Models\Terms;
use App\Models\Banner;
use App\Models\ContainerPrice;
use App\Models\GeneralSetting;
use App\Models\PointSetting;
use Session;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        $cars = Car::orderBy('id', 'desc')->get();   
        $terms=Terms::where('service_type','car_service')->first();
        $cargos = Cargo::get();
        $hotels = Hotel::get();
        $bustickets = BusTicket::get();
        // dd($bustickets);
        return view('frontend.cars',compact('cars','terms','cargos','hotels','bustickets'));
    }
    public function registeradd()
    {         
        $cities = City::all();                
        $states = State::all(); 
        $generalsetting=GeneralSetting::where('id',4)->get();
        $pointlists=PointSetting::where('user_id',17)->orderBy('collect_date', 'desc')->first();
        $pointcount=PointSetting::where('user_id',17)->orderBy('collect_date', 'desc')->count();
        //dd($pointlists->collect_date);exit;               
        return view('frontend.user-register.add',compact('cities','states','pointlists','pointcount','generalsetting'));
    }
    public function agentadd()
    {         
        $cities = City::all();                
        $states = State::all();                
        return view('frontend.user-register.agentadd',compact('cities','states'));
    }

    public function agentcreate(Request $request)
    {
         $this->validate($request,[
            'new_password'         => 'required',
            'confirm_password' => 'required|same:new_password' 
           
        ]);

               
        $label_name=array();
        $label_value=array();

        $count=count($request->label_name);
        $label_name=$request->label_name;
        $label_value=$request->label_value;

      
        for($i=0;$i<$count;$i++){
            $shop_info[ $label_name[$i] ]= $label_value[$i];
        }
        //dd(json_encode($shop_info,true));exit;

         $api_user = ApiUser::create([
            'name'       => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'state_id'    => $request->state_id,
            'city_id'      =>$request->city_id,
            'address'   => $request->address,
            'password'   => $request->confirm_password,
            'status'   => 'agent',
            'is_active'   => 0,
            'isAgent'   => 'agent',
            'shop_info'   => json_encode($shop_info,true),
            'created_by'    => 0,
        ]);

        $user_id=$api_user->id;

        $rand=rand(1,999999);
        Session::put('randomkey', $rand);


        $lists=GeneralSetting::find(1);
        $coin_type=$lists->name;
        $collected_point=$lists->value;

        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));
         $point=array(
                    'user_id'     => $user_id,          
                    'coin_id'     => 1,          
                    'coin_type'   => $coin_type,
                    'use_point'       => 0,
                    'collected_point'       => $collected_point, 
                    'coin_des'    =>"Agent Register",
                    'coin_expire_date' =>$expiredate,
                    'coin_status' =>1,   
                    'point_status' =>'available',
                );
               
               $pointsetting = PointSetting::create($point);



        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Apiuser: ".json_encode($api_user);

        LogWriter::user_activity($activity,'Addingapiuser');
     
        return redirect()->route('verifyformAdd');
        
    }


    public function carindex()
    {
       $cars = Car::orderBy('id', 'desc')->get(); 
       $terms=Terms::where('service_type','car_service')->first();
       return view('frontend.cars',compact('cars','terms'));
    }

    public function tourindex()
    {
       $tours = Tour::orderBy('id', 'desc')->get(); 
       $terms=Terms::where('service_type','tour_service')->first();
        return view('frontend.tours',compact('tours','terms'));
    }
    public function hotelindex()
    {
       $hotels = Hotel::orderBy('id', 'desc')->get();  
       $terms=Terms::where('service_type','hotel_service')->first();
       return view('frontend.hotel',compact('hotels','terms'));
    }

    public function busticketindex()
    {
       $bustickets = BusTicket::orderBy('id', 'desc')->get(); 
       $terms=Terms::where('service_type','busticket_service')->first();
       return view('frontend.busticket',compact('bustickets','terms'));
    }
    public function tourdestination()
    {
       $tourdestinations = TourDestination::orderBy('id', 'desc')->get(); 
       $terms=Terms::where('service_type','tour_service')->first();
       return view('frontend.tourdestination',compact('tourdestinations','terms'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getweight($city_id)
    {
        //$city_id = $request->city_id;
         $data = DB::table('delivery_charges')
            ->where('city_id',$city_id)
            ->get();
        echo json_encode($data);   
    }

     public function registercreate(Request $request)
    {
         $this->validate($request,[
            'new_password'         => 'required',
            'confirm_password' => 'required|same:new_password' 
           
        ]);
               
        $api_user = ApiUser::create([
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'state_id'   => $request->state_id,
            'city_id'    => $request->city_id,
            'address'    => $request->address,
            'password'   => $request->confirm_password,
            'created_by' => 0,
            'status' => 'user',           
            'shop_info' => "",           
        ]);

        $user_id=$api_user->id;
        $lists=GeneralSetting::find(1);
        $coin_type=$lists->name;
        $collected_point=$lists->value;

        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));
         $point=array(
                    'user_id'     => $user_id,          
                    'coin_id'     => 1,          
                    'coin_type'   => $coin_type,
                    'collected_point'       => $collected_point, 
                    'use_point'       => 0, 
                    'coin_des'    =>"Register",
                    'coin_expire_date' =>$expiredate,
                    'coin_status' =>1,   
                    'point_status' =>'available',                  
                );
               
               $pointsetting = PointSetting::create($point);

        $rand=rand(1,999999);
        Session::put('randomkey', $rand);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Apiuser: ".json_encode($api_user);

        LogWriter::user_activity($activity,'Addingapiuser');
     
        return redirect()->route('verifyformAdd');
        
    }

    public function verifyform()
    {
        return view('frontend.user-register.verifyform');
    }

    public function verificationCreate()
    {
        session()->forget('randomkey');
        return redirect()->route('verifyformAdd');
    }

    public function containerindex()
    {
       $containers = Container::orderBy('id', 'desc')->get();    
       $terms=Terms::where('service_type','container_service')->first();
       return view('frontend.container', compact('containers','terms'));
    }

    public function cargoindex()
    {
       $cargos = cargo::orderBy('id', 'desc')->get();  
       $terms=Terms::where('service_type','cargo_service')->first();
       return view('frontend.cargo', compact('cargos','terms'));
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
    public function carview($id)
    {
        //
        $car = Car::find($id);
        return view('frontend.carview_detail', compact('car'));
    }

    public function containerview($id)
    {
        
        $containerprices=ContainerPrice::where('container_id',$id)->get();
        $container = Container::find($id);
        return view('frontend.containerview_detail', compact('container','containerprices'));
    }

    public function cargoview($id)
    {
        //
        $cargo = Cargo::find($id);
        return view('frontend.cargoview_detail', compact('cargo'));
    }

    public function tourview($id)
    {
        //
        $itineary=TourItineary::where('tour_id',$id)->get();
        $tour = Tour::find($id);
        return view('frontend.tourview_detail', compact('tour','itineary'));
    }
    /*public function tourdesview($id,$desid)
    {
        $tourdestination = TourDestination::find($desid);
        $itineary=TourItineary::where('tour_id',$id)->get();
        $tour = Tour::find($id);
        return view('frontend.tourview_detail', compact('tour','tourdestination','itineary'));
    }*/
    public function tourdesview($id)
    {
        $itineary=TourItineary::where('tour_id',$id)->get();
        $tour = Tour::find($id);
        return view('frontend.tourview_detail', compact('tour','itineary'));
    }
     public function hotelview($id)
    {
        $roomtypes=HotelRoomType::where('hotel_id',$id)->get();
        $hotel = Hotel::find($id);
        return view('frontend.hotelview_detail', compact('hotel','roomtypes'));
    }
     public function tourdestinationview($id)
    {
        $tourdestination = TourDestination::find($id);
        $tourplaces=TourDestinationPlace::where('tour_destination_id',$id)->get();
        $terms=Terms::where('service_type','tour_service')->first();
        //$this->db->like('JSON_EXTRACT("evinfo", "$.'.$key.'")', $value, 'both');
        $tours=DB::table('tours')
            //->where('JSON_EXTRACT("destination_id","like","%$.'.$id.'.%")', '', 'both') ['.$id.']
            ->whereRaw('json_contains(destination_id, \'["' . $id . '"]\')')
            ->get();
           
        return view('frontend.tourdestinationview_detail', compact('tourdestination','tourplaces','tours','terms'));
    }
    public function tourdestinationplaceview($id)
    {
        $tourplace = TourDestinationPlace::find($id);
        $tour_destination_id=$tourplace->tour_destination_id;
       
        $terms=Terms::where('service_type','tour_service')->first();
        //$this->db->like('JSON_EXTRACT("evinfo", "$.'.$key.'")', $value, 'both');
        $tours=DB::table('tours')
            //->where('JSON_EXTRACT("destination_id","like","%$.'.$id.'.%")', '', 'both') ['.$id.']
            ->whereRaw('json_contains(destination_id, \'["' . $tour_destination_id . '"]\')')
            ->get();
           
        return view('frontend.tourdestinationplaceview_detail', compact('tourplace','tours','terms'));
    }
    

     public function getstatecity(Request $request) {
        $state_id = $request->state_id;
         $data = DB::table('cities')
             ->where('state_id',$state_id)
            ->get();
        
            echo json_encode($data);       
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
        //
    }
}
