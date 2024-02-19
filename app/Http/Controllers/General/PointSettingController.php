<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiUser;
use App\Models\GeneralSetting;
use App\Models\PointSetting;
use App\Services\LogWriter;
use Illuminate\Support\Facades\DB;

class PointSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('point-setting.show');
        //$lists = PointSetting::select('user_id', DB::raw('sum(collected_point) as total'))->groupBy('user_id')->get();
        
        /*$collected_point=PointSetting::select(DB::raw('sum(collected_point) as totalcollected,user_id'))
        ->where('point_status','=','available')
        ->groupBy('user_id')
        ->get();*/
      
        $lists = PointSetting::select(DB::raw('sum(collected_point) as total,user_id'), DB::raw('sum(use_point) as usepoint'))
                ->groupBy('user_id')
                ->orderBy('id','desc')
                ->get();

        return view('pages.point_setting.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('point-setting.add');
        return view('pages.point_setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginpointcreate11(Request $request)
    {
        $user_id=$request->user_id; 

        $general_id=$request->coin_id;
        $lists=GeneralSetting::find($general_id);
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
                        'user_id'     => $request->user_id,
                        'coin_id'     => $request->coin_id,
                        'collected_point'     => $collected_point,
                        'coin_type'   =>$coin_type,
                        'coin_des'    =>"Daily Login",
                        'coin_expire_date' =>$expiredate,
                        'coin_status' =>1,
                              
                    ]);
            }
                                 
            /*if($pointcount==0){
                $pointsetting = PointSetting::create([
                    'user_id'     => $request->user_id,
                    'coin_id'     => $request->coin_id,
                    'collected_point'     => $collected_point,
                    'coin_type'   =>$coin_type,
                    'coin_des'    =>"First Login",
                    'coin_expire_date' =>$expiredate,
                    'coin_status' =>1,
                          
                ]);
            }else{
            
                if(date("Y-m-d",strtotime($pointlists->collect_date)) != date("Y-m-d")){
                    $pointsetting = PointSetting::create([
                        'user_id'     => $request->user_id,
                        'coin_id'     => $request->coin_id,
                        'collected_point'     => $collected_point,
                        'coin_type'   =>$coin_type,
                        'coin_des'    =>"Daily Login",
                        'coin_expire_date' =>$expiredate,
                        'coin_status' =>1,
                              
                    ]);
                }

            }*/

        return $pointsetting;
    }
    
    public function loginpointcreate(Request $request)
    {
        $user_id=$request->user_id; 

        $general_id=$request->coin_id;
        $lists=GeneralSetting::find($general_id);
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
                        'user_id'     => $request->user_id,
                        'coin_id'     => $request->coin_id,
                        'collected_point'     => $collected_point,
                        'use_point'     => 0,
                        'coin_type'   =>$coin_type,
                        'coin_des'    =>"Daily Login",
                        'coin_expire_date' =>$expiredate,
                        'coin_status' =>1,
                        'point_status' =>"available"
                              
                    ]);
            }
                                 
            /*if($pointcount==0){
                $pointsetting = PointSetting::create([
                    'user_id'     => $request->user_id,
                    'coin_id'     => $request->coin_id,
                    'collected_point'     => $collected_point,
                    'coin_type'   =>$coin_type,
                    'coin_des'    =>"First Login",
                    'coin_expire_date' =>$expiredate,
                    'coin_status' =>1,
                          
                ]);
            }else{
            
                if(date("Y-m-d",strtotime($pointlists->collect_date)) != date("Y-m-d")){
                    $pointsetting = PointSetting::create([
                        'user_id'     => $request->user_id,
                        'coin_id'     => $request->coin_id,
                        'collected_point'     => $collected_point,
                        'coin_type'   =>$coin_type,
                        'coin_des'    =>"Daily Login",
                        'coin_expire_date' =>$expiredate,
                        'coin_status' =>1,
                              
                    ]);
                }

            }*/

        return $pointsetting;
    }
    
    public function changemoney(Request $request)
    {
        $user_id=$request->user_id;
        $general_id=$request->coin_id;
 
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

               /* ApiUser::where('id','=', $user_id)
                       ->update([
                           'wallet' => 'used'
                        ]);*/
            }

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
