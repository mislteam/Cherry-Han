<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Container;
use App\Models\ContainerPrice;

class ApiContainerController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $container=Container::all(['id','name','feature_photo as image']);
        // $sel = ["id", "name", "brand_id", "model_id", "width", "height", "length", "capacity", "city_id", "state_id", "country_id", "wheel_drive", "license_type", "service", "driver_id", "ownner_id", "feature_photo as image", "gallery", "booking_status", "booking_for", "status", "created_by"];
        // $container=Container::get($sel);
        // return self::successResponse($container);
        
          $sel = ["id", "name", "brand_id", "model_id", "width", "height", "length", "capacity", "city_id", "state_id", "country_id", "wheel_drive", "license_type", "service", "driver_id", "ownner_id", "feature_photo as image", "gallery", "booking_status", "booking_for", "status", "created_by"];
        $container=Container::get($sel);
        $i = 0;
        foreach($container as $val){
            $data[$i] = array(
                'id' => $val->id,
                'name' => $val->name,
                'brand_id' => $val->brand->name,
                'model_id' => $val->car_model->name,
                'width' => $val->width,
                'height' => $val->height,
                'length'=> $val->length,
                'capacity' => $val->capacity,
                // 'city_id' => $val->city->name,
                // 'state_id' => $val->state->name,
                // 'country_id' => $val->country->name,
                'wheel_drive' => $val->wheel_drive,
                'license_type' => $val->license_type,
                'service' => $val->service,
                'driver_id' => $val->driver->name,
                'ownner_id' => $val->owner->name,
                'image' => $val->image,
                'gallery' => $val->gallery,
                'booking_status' => $val->booking_status,
                'booking_for' => $val->booking_for,
                'status' => $val->status,
                'created_by' => $val->created_by,
            );$i++;
        }
        return self::successResponse($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function containerprice($container_id)
    {
        $containerprices=ContainerPrice::where('container_id',$container_id)->get();
        return self::successResponse($containerprices);
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
         $container=Container::find($id);
         $data[] = array(
                'id' => $container->id,
                'name' => $container->name,
                'brand_id' => $container->brand->name,
                'model_id' => $container->car_model->name,
                'width' => $container->width,
                'height' => $container->height,
                'length'=> $container->length,
                'capacity' => $container->capacity,
                'city_id' => $container->city->name,
                'state_id' => $container->state->name,
                'country_id' => $container->country->name,
                'wheel_drive' => $container->wheel_drive,
                'license_type' => $container->license_type,
                'service' => $container->service,
                'driver_id' => $container->driver->name,
                'ownner_id' => $container->owner->name,
                'image' => $container->image,
                'gallery' => $container->gallery,
                'booking_status' => $container->booking_status,
                'booking_for' => $container->booking_for,
                'status' => $container->status,
                'created_by' => $container->created_by,
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
