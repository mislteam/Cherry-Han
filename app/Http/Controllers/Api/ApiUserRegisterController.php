<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiUser;
use App\Models\GeneralSetting;
use App\Models\PointSetting;
use Session;

class ApiUserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'name'         => 'required',
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
            'password'   => $request->confirm_password, // this is plain text
            // 'password'      => Hash::make($request->confirm_password), // this is encrypted password
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

        return [
            'result' => $api_user,
            'pointsetting' => $pointsetting
        ];
    }

    public function agentcreate(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
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
            'password'   => $request->confirm_password, // this is plain text
            // 'password'      => Hash::make($request->confirm_password), // this is encrypted password
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
                    'collected_point'       => $collected_point, 
                    'use_point'       => 0, 
                    'coin_des'    =>"Agent Register",
                    'coin_expire_date' =>$expiredate,
                    'coin_status' =>1,     
                    'point_status' =>'available',               
                );
               
               $pointsetting = PointSetting::create($point);

        return [
            'result' => $api_user,
            'pointsetting' => $pointsetting
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
