<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TourDestination;
use App\Models\TourDestinationPlace;

class ApiTourDestinationController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = TourDestination::all();
        return self::successResponse($list); 
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tourdestinationplace($destination_id)
    {
        $tourplaces_list=TourDestinationPlace::where('tour_destination_id',$destination_id)->get();
        return self::successResponse($tourplaces_list);
    }

    public function destination2tour($destination_id)
    {
       $tours=DB::table('tours')
            ->whereRaw('json_contains(destination_id, \'["' . $destination_id . '"]\')')
            ->get();
        return self::successResponse($tours); 
      
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
      
        $list=TourDestination::find($id);
        return self::successResponse($list);


        /*$tours=json_decode($tours1,true);
      
      
       $tourplaces =[];
       $tour=[];

       foreach($tours as $key=>$val){
            $tour[$key] =array(
                "id" => $val['id'],
                "tour_name" => $val['tour_name'],
                "package" => $val['package'],
                "tour_destination_id" => $val['destination_id'],
                "price" => $val['price'],
            );

        }
  

        foreach($tourplaces_list as $key=>$value){
            $tourplaces[$key] =array(
                "id" => $value['id'],
                "name" => $value['name'],
                "description" => $value['description'],
                "tour_destination_id" => $list->id,
                "feature_photo" => $value['feature_photo'],
                "created_by" => $value['created_by'],
                "created_at" => $value['created_at'],
                "updated_at" => $value['updated_at'],
            );

        }

        $data= array(
            'id' =>$list->id , 
            'name' =>$list->name, 
            'description' =>$list->description, 
            'created_by' =>$list->created_by, 
            'created_at' =>$list->created_at, 
            'updated_at' =>$list->updated_at, 
            'tour' =>$tour,
            'tour_places' =>$tourplaces,
            'terms' => $terms
        );*/
        //return self::successResponse($data); 

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
