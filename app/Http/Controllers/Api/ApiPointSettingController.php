<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiUser;
use App\Models\GeneralSetting;
use App\Models\PointSetting;

class ApiPointSettingController extends ResponseController
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
    public function store($user_id,$general_id)
    {
        //$lists=GeneralSetting::find($general_id);
        $lists=GeneralSetting::find(3);
        $coin_type=$lists->name;
        $collected_point=$lists->value;
        
        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));
    
            $pointlists=PointSetting::where('user_id',$user_id)->orderBy('collect_date', 'desc')->first(); 
            $pointcount=PointSetting::where('user_id',$user_id)->orderBy('collect_date', 'desc')->count();  

            if($pointcount >=1){
                $pointsetting = PointSetting::create([
                        'user_id'     => $user_id,
                        'coin_id'     => $general_id,
                        'collected_point'     => $collected_point,
                        'use_point'     => 0,
                        'coin_type'   =>$coin_type,
                        'coin_des'    =>"Daily Login",
                        'coin_expire_date' =>$expiredate,
                        'coin_status' =>1,
                        'point_status' =>'available',
                              
                    ]);
                return self::successResponse($pointsetting);
            }                                

        
    }


    public function changemoney($user_id)
    {
        //$user_id=$request->user_id;
        //$general_id=$request->coin_id;    

        $general_id=4;
 
        $total_point=PointSetting::where('user_id','=',$user_id)->where('point_status','!=','used')->sum('collected_point');
    
        $generalsetting=GeneralSetting::find($general_id);
        $use_point=$generalsetting->name;
        $kyats=$generalsetting->value;

        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));

        if($total_point >= $generalsetting->name){

            $point=$total_point-$generalsetting->name;

            $pointsetting = PointSetting::create([
                        'user_id'     => $user_id,
                        'coin_id'     => $general_id,
                        'collected_point'     => 0,
                        'use_point'     => $generalsetting->name,
                        'coin_type'   =>$generalsetting->name." points",
                        'coin_des'    =>"Use Point",
                        'coin_expire_date' =>$expiredate,
                        'coin_status' =>1,
                        'use_point' =>$use_point,
                        'point_status' =>"used"
                              
            ]);
            

            if($pointsetting){

                $api_user=ApiUser::find($user_id);
                $wallet=$api_user->wallet;

                $api_user->wallet=$wallet+$kyats;
                $api_user->save();

            }
            return self::successResponse($pointsetting);

           


        }

       


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
