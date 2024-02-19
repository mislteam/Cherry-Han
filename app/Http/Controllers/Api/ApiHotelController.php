<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelRoomType;

class ApiHotelController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hotel=Hotel::all(['id','name','feature_photo as image']);
        // return self::successResponse($hotel);
         $self = ['id','name','feature_photo as image','phone','email','website','address','description','gallery',
                'country_id','state_id','city_id','star_level','service','status','created_at','updated_at'];
        $hotel = Hotel::get($self);
        $i = 0;
        foreach($hotel as $val){
            $data[$i] = array(
                'id' => $val->id,
                'name' => $val->name,
                'image' => $val->image,
                'phone' => $val->phone,
                'email' => $val->email,
                'website' => $val->website,
                'address' => $val->address,
                'description' => $val->description,
                'gallery' => $val->gallery,
                'country_id' => $val->country->name,
                'state_id' => $val->state->name,
                'city_id' => $val->city->name,
                'star_level' => $val->star_level,
                'service' => $val->service,
                'status' => $val->status,
                'created_at' => $val->created_at,
                'updated_at' => $val->updated_at,
            );$i++;
        }
        return self::successResponse($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roomtype($hotel_id)
    {
        $roomtypes=HotelRoomType::where('hotel_id',$hotel_id)->get();
        return self::successResponse($roomtypes);

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
          $hotel=Hotel::find($id);
         $data[] = array(
                'id' => $hotel->id,
                'name' => $hotel->name,
                'image' => $hotel->feature_photo,
                'phone' => $hotel->phone,
                'email' => $hotel->email,
                'website' => $hotel->website,
                'address' => $hotel->address,
                'description' => $hotel->description,
                'gallery' => $hotel->gallery,
                'country_id' => $hotel->country->name,
                'state_id' => $hotel->state->name,
                'city_id' => $hotel->city->name,
                'star_level' => $hotel->star_level,
                'service' => $hotel->service,
                'status' => $hotel->status,
                'created_at' => $hotel->created_at,
                'updated_at' => $hotel->updated_at,
            );
        return self::successResponse($data);
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
