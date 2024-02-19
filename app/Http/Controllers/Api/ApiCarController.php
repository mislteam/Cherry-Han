<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class ApiCarController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sel = ["id", "name", "model_id", "brand_id", "width", "height", "length", "user_id", "car_type_id", "trip_type", "day_type", "city_id", "state_id", "country_id", "seat_no", "ac", "wheel_drive", "abs", "airbag", "no_of_laggage", "service", "license_type", "driver_id", "ownner_id", "feature_photo as image", "gallery"];
        $car = Car::get($sel);
        $i = 0;
        foreach($car as $val){
            $gallery =array_merge([$val->image], json_decode($val->gallery));
            $service = json_decode($val->service);
            $data[$i] = array(
                "id" => $val->id,
                "name" => $val->name,
                "model_id" => $val->car_model->name,
                "brand_id" => $val->brand->name,
                "width" => $val->width,
                "height" => $val->height,
                "length" => $val->length,
                // "user_id" => $val->user_id,
                "car_type_id" => $val->cartype->name,
                "trip_type" => $val->trip_type,
                "day_type" => $val->day_type,
                "city_id" => $val->city_id,
                "state_id" => $val->state_id,
                "country_id" => $val->country_id,
                "seat_no" => $val->seat_no,
                "ac" => $val->ac,
                "wheel_drive" => $val->wheel_drive,
                "abs" => $val->abs,
                "airbag" => $val->airbag,
                "no_of_laggage" => $val->no_of_laggage,
                "service" => json_encode($service),
                "license_type" => $val->license_type,
                "driver_id" => $val->driver_id,
                "ownner_id" => $val->ownner_id,
                "image" => $val->image,
                "gallery" => $val->gallery,
                "gallery" => json_encode($gallery, true),
                // "status" => $val->status,
                // "created_by" => $val->created_by,
            );
            $i++;
        }
        return self::successResponse($data);
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
       $car=Car::find($id);
        $data[] = array(
            "id" => $car->id,
            "name" => $car->name,
            "model_id" => $car->car_model->name,
            "brand_id" => $car->brand->name,
            "width" => $car->width,
            "height" => $car->height,
            "length" => $car->length,
            "user_id" => $car->user_id,
            "car_type_id" => $car->cartype->name,
            "trip_type" => $car->trip_type,
            "day_type" => $car->day_type,
            "city_id" => $car->city_id,
            "state_id" => $car->state_id,
            "country_id" => $car->country_id,
            "seat_no" => $car->seat_no,
            "ac" => $car->ac,
            "wheel_drive" => $car->wheel_drive,
            "abs" => $car->abs,
            "airbag" => $car->airbag,
            "no_of_laggage" => $car->no_of_laggage,
            "service" => $car->service,
            "license_type" => $car->license_type,
            "driver_id" => $car->driver_id,
            "ownner_id" => $car->ownner_id,
            "image" => $car->feature_photo,
            "gallery" => $car->gallery,
            "status" => $car->status,
            "created_by" => $car->created_by,
        );
        return self::successResponse($data);

    }
    
    public function details(Request $request, $id)
    {
        $id = $request->id;
        $car=Car::find($id);
        $data[] = array(
            "id" => $car->id,
            "name" => $car->name,
            "model_id" => $car->car_model->name,
            "brand_id" => $car->brand->name,
            "width" => $car->width,
            "height" => $car->height,
            "length" => $car->length,
            "user_id" => $car->user_id,
            "car_type_id" => $car->cartype->name,
            "trip_type" => $car->trip_type,
            "day_type" => $car->day_type,
            "city_id" => $car->city_id,
            "state_id" => $car->state_id,
            "country_id" => $car->country_id,
            "seat_no" => $car->seat_no,
            "ac" => $car->ac,
            "wheel_drive" => $car->wheel_drive,
            "abs" => $car->abs,
            "airbag" => $car->airbag,
            "no_of_laggage" => $car->no_of_laggage,
            "service" => $car->service,
            "license_type" => $car->license_type,
            "driver_id" => $car->driver_id,
            "ownner_id" => $car->ownner_id,
            "image" => $car->feature_photo,
            "gallery" => $car->gallery,
            "status" => $car->status,
            "created_by" => $car->created_by,
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
