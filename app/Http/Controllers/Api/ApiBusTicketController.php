<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusTicket;
use App\Models\TourDestination;

class ApiBusTicketController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $busticket=BusTicket::all(["id","name","phone","email","address","bus_type","price","feature_photo as image","bus_gate_id","destination_id","no_seat","available_seat","note","status","created_by"]);        
        // return self::successResponse($busticket);
        
        $self = ['id','name','phone','email','address','bus_type','price','feature_photo as image','bus_gate_id','destination_id','no_seat','available_seat','note','status','created_at','created_by','updated_at','updated_by'];
        $i = 0;
        $busticket = BusTicket::get($self);
        $destination = TourDestination::all();
        foreach($busticket as $val){

            foreach($destination as $dest){ 
                if(in_array($dest->id,json_decode($val->destination_id,true))){
                    $destinationList[] = $dest->name;
                }   
            }

            $data[$i] = array(
                'id'    => $val->id,
                'name'  => $val->name,
                'phone' => $val->phone,
                'email' => $val->email,
                'address'=> $val->address,
                'bus_type'=> $val->bus_type,
                'price' => $val->price,
                'image' => $val->image,
                'bus_gate_id' => $val->busgate->name,
                'destination_id' => $destinationList,
                'no_seat' => $val->no_seat,
                'available_seat' => $val->available_seat,
                'note' => $val->note,
                'status' => $val->status,
                'created_at' => $val->created_at,
                'created_by' => $val->created_by,
                'updated_at' => $val->updated_at,
                'updated_by' => $val->updated_by,
            );$i++;
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
         $busticket = BusTicket::find($id);
        $destination = TourDestination::all();

        foreach($destination as $dest){
                if(in_array($dest->id,json_decode($busticket->destination_id,true))){
                    $destinationList[] = $dest->name;
            }
        }

        $data[] = array(
            'id'    => $busticket->id,
            'name'  => $busticket->name,
            'phone' => $busticket->phone,
            'email' => $busticket->email,
            'address'=> $busticket->address,
            'bus_type'=> $busticket->bus_type,
            'price' => $busticket->price,
            'image' => $busticket->feature_photo,
            'bus_gate_id' => $busticket->busgate->name,
            'destination_id' => $destinationList,
            'no_seat' => $busticket->no_seat,
            'available_seat' => $busticket->available_seat,
            'note' => $busticket->note,
            'status' => $busticket->status,
            'created_at' => $busticket->created_at,
            'created_by' => $busticket->created_by,
            'updated_at' => $busticket->updated_at,
            'updated_by' => $busticket->updated_by,
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
