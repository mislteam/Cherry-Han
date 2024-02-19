<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourItineary;
use App\Models\Tour;
use App\Models\TourDestination;

class ApiTourController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $self = ['id','tour_name','category_id','destination_id','feature_photo as image','gallery','price','package','passenger','description','include','exclude','contact_person','phone','email','website','status','created_at','created_by','updated_by','updated_at'];
        $tours=Tour::get($self);
        $tourdestination = TourDestination::all();
        $i = 0;
        foreach($tours as $val){
            foreach($tourdestination as $dest){
                if(in_array($dest->id,json_decode($val->destination_id,true))){
                    $destinationList[] = $dest->name;
                }
            }
            $data[$i] = array(
                'id' => $val->id,
                'name' => $val->tour_name,
                'category_id' => $val->tourcategory->name,
                'destination_id' => $destinationList,
                'image' => $val->image,
                'gallery' => $val->gallery,
                'price' => $val->price,
                'package' => $val->package,
                'passenger' => $val->passenger,
                'description' => $val->description,
                'include' => $val->include,
                'exclude' => $val->exclude,
                'contact_person' => $val->contact_person,
                'phone' => $val->phone,
                'email' => $val->email,
                'website' => $val->website,
                'status' => $val->status,
                'created_at' => $val->created_at,
                'created_by' => $val->created_by,
                'updated_by' => $val->updated_by,
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
    public function touritineary($tour_id)
    {
        $itineary=TourItineary::where('tour_id',$tour_id)->get();
        return self::successResponse($itineary);

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
           $tour = Tour::find($id);
        $tourdestination = TourDestination::all();
        foreach($tourdestination as $dest){
            if(in_array($dest->id,json_decode($tour->destination_id,true))){
                $destinationList[] = $dest->name;
            }
        }

        $data[] =  array(
                'id' => $tour->id,
                'name' => $tour->tour_name,
                'category_id' => $tour->tourcategory->name,
                'destination_id' => $destinationList,
                'image' => $tour->feature_photo,
                'gallery' => $tour->gallery,
                'price' => $tour->price,
                'package' => $tour->package,
                'passenger' => $tour->passenger,
                'description' => $tour->description,
                'include' => $tour->include,
                'exclude' => $tour->exclude,
                'contact_person' => $tour->contact_person,
                'phone' => $tour->phone,
                'email' => $tour->email,
                'website' => $tour->website,
                'status' => $tour->status,
                'created_at' => $tour->created_at,
                'created_by' => $tour->created_by,
                'updated_by' => $tour->updated_by,
                'updated_at' => $tour->updated_at,
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
