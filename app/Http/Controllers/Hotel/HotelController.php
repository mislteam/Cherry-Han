<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\HotelRoomType;
use Illuminate\Http\Request;
use App\Services\LogWriter;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('hotel.show');

        $lists = Hotel::orderBy('id', 'desc')->get();

        return view('pages.hotel.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function add()
    {
        abort_if_forbidden('hotel.add');
        //$countries = Country::all();
        $countries  = Country::where('hotel_status','=','active')->get();
        $states     = State::where('hotel_status','=','active')->get();
        $starlevels=array('1','2','3','4','5');
        $locations=State::all();
        return view('pages.hotel.add',compact('locations','starlevels', 'countries','states'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function create(Request $request)
    {
        abort_if_forbidden('hotel.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);

        $gallery_photo = array();
        $feature_photo = '';
        $upload = false;
        
        if($request->hasfile('gallery'))
        {
            
            foreach($request->file('gallery') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/hotel'), $name);
                $gallery_photo[] = $name;
            }
        }
        
        if($feature_file=$request->file('feature_photo'))
        {
            
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/hotel'), $feature_photo);
        }

        $hotel = Hotel::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'address'       => $request->address,
            'country_id'    => $request->country_id,           
            'state_id'      => $request->state_id,           
            'city_id'          => $request->city_id,           
            'website'       => $request->website,
            'service'       => json_encode($request->service,true),
            'feature_photo' => $feature_photo,
            'gallery'       => json_encode($gallery_photo,true),
            'description'   => $request->description,
            'star_level'    => $request->star_level,
            'status'        => 'yes',
            'created_by'    => auth()->id(),
        ]);
        $hotel_id=$hotel->id;

      
        $count=count($request->room_name);
        
        for($i=0;$i<$count;$i++){
    
            $room=array(
                'room_name'     => $request->room_name[$i],           
                'description'   => null,
                'price'         => $request->price[$i],
                'hotel_id'      => $hotel_id,
                'created_by'    => auth()->id(),
            );
           
           $roomtype = HotelRoomType::create($room);
        }


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew hotel: ".json_encode($hotel);

        LogWriter::user_activity($activity,'Addinghotel');

        if (auth()->user()->can('hotel.create'))
            return redirect()->route('hotelIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('hotel.edit');
        $hotel      = Hotel::find($id);
        $countries  = Country::where('hotel_status','=','active')->get();
        $states     = State::where('hotel_status','=','active')->get();
        $cities     = City::where('hotel_status','=','active')->get();
        $starlevels = array('1','2','3','4','5');
        $roomtypes  = HotelRoomType::where('hotel_id',$id)->get();
        $locations  = State::all();
        return view('pages.hotel.edit',compact('hotel','locations','starlevels','roomtypes', 'countries', 'states', 'cities' ));
    }

    public function view($id)
    {
        abort_if_forbidden('hotel.view');
        $hotel = Hotel::find($id);
        return view('pages.hotel.view', compact('hotel'));
    }

    // update hotel dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('hotel.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);
        $hotel = Hotel::find($id);

        if($feature_file=$request->file('feature_photo'))
        {           
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/hotel'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }

        $gallery_photo=array();

         if(request('old_gallery') !=""){
            $oldgallery = request('old_gallery');
        }else{
           $oldgallery = [];
        }
        //dd($oldgallery);exit;

        
        if($files=$request->file('gallery')){
            foreach($files as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/hotel'), $name);
                $gallery_photo[] = $name;
                
            }
        
             $gallery=array_merge($oldgallery, $gallery_photo);
             //dd($gallery);exit;
        }else{
                $gallery = $oldgallery;
            }

        $before = $hotel;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates hotel: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $hotel->fill($request->all());
        $hotel->feature_photo   = $feature_photo;
        $hotel->gallery         = $gallery;
        $hotel->save();

        $count=HotelRoomType::where('hotel_id', $id)->count();
        //$delete=HotelRoomType::where('hotel_id', $id)->delete();
        if($count>0){
            $delete=HotelRoomType::where('hotel_id', $id)->delete();
            $room_name=$request->room_name;
            $price=$request->price;
            $count=count($request->room_name);
            
            for($i=0;$i<$count;$i++){
        
                $room=array(
                    'room_name'     => $room_name[$i],          
                    'price'     => $price[$i],          
                    'description'   => null,
                    'hotel_id'       => $id,            
                    'created_by'    => auth()->id(),
                );
               
               $roomtype = HotelRoomType::create($room);
            }
  
        }
        else{
            $room_name=$request->room_name;
            $price=$request->price;
            $count=count($request->room_name);
            
            for($i=0;$i<$count;$i++){
        
                $room=array(
                    'room_name'     => $room_name[$i],          
                    'price'     => $price[$i],          
                    'description'   => null,
                    'hotel_id'       => $id,            
                    'created_by'    => auth()->id(),
                );
               
               $roomtype = HotelRoomType::create($room);
            }
        }
        
        $afterCat = $hotel;
        $activity .="\nAfter updates hotel: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editinghotel');

        if (auth()->user()->can('hotel.edit'))
            return redirect()->route('hotelIndex');
        else
            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel=Hotel::find($id);
        $hotel->delete();
        return redirect()->route('hotelIndex');
    }
}
