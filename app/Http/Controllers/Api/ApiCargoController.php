<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;


class ApiCargoController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sel = ["id", "name", "brand_id", "model_id", "width", "height", "length", "capacity", "city_id", "state_id", "country_id", "car_type_id", "wheel_drive", "license_type", "service", "driver_id", "ownner_id", "feature_photo as image", "gallery", "booking_status", "booking_for", "status", "created_by"];
        $cargo = Cargo::get($sel);
        $i= 0;
        foreach($cargo as $val){
            $data[$i] = array(
                'id' => $val->id,
                'name' => $val->name,
                'brand_id' => $val->brand->name,
                'model_id' => $val->car_model->name,
                'width' => $val->width,
                'height' => $val->height,
                'length' => $val->length,
                'capacity' => $val->capicity,
                'city_id' => $val->city->name,
                'state_id' => $val->state->name,
                'country_id' => $val->country->name,
                'car_type_id' => $val->cartype->name,
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
                'created_by'=>$val->created_by,
            );$i++;
        }
        return self::successResponse($cargo);
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
        $cargo=Cargo::find($id);
            $data[] = array(
                'id' => $cargo->id,
                'name' => $cargo->name,
                'brand_id' => $cargo->brand->name,
                'model_id' => $cargo->car_model->name,
                'width' => $cargo->width,
                'height' => $cargo->height,
                'length' => $cargo->length,
                'capacity' => $cargo->capicity,
                'city_id' => $cargo->city->name,
                'state_id' => $cargo->state->name,
                'country_id' => $cargo->country->name,
                'car_type_id' => $cargo->cartype->name,
                'wheel_drive' => $cargo->wheel_drive,
                'license_type' => $cargo->license_type,
                'service' => $cargo->service,
                'driver_id' => $cargo->driver->name,
                'ownner_id' => $cargo->owner->name,
                'image' => $cargo->feature_photo,
                'gallery' => $cargo->gallery,
                'booking_status' => $cargo->booking_status,
                'booking_for' => $cargo->booking_for,
                'status' => $cargo->status,
                'created_by'=>$cargo->created_by,
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
