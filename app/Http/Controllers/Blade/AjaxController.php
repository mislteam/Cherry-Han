<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\LogWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //get state by country id
    public function getcountrystate(Request $request) {
        abort_if_forbidden('user.show');
        $country_id = $request->country_id;
        $service = $request->service;
        $status = ($service !='')?$service.'_status':'status';
        $data = DB::table('states')
            ->where('country_id', $country_id)
            ->where($status, 'active')
            ->get();
        
        echo json_encode($data);       
    }
    
     //get sent message
    public function getsentmessage(Request $request) {
        abort_if_forbidden('user.show');
        $isAgent = $request->isAgent;
       
        $data   = DB::table('api_users')
            ->where('isAgent',$isAgent)         
            ->get();
        
        echo json_encode($data);       
    }
    
    //get city by state id
    public function getstatecity(Request $request) {
        abort_if_forbidden('user.show');
        $state_id = $request->state_id;
        $service = $request->service;
        $status = ($service !='')?$service.'_status':'status';
        $data   = DB::table('cities')
            ->where('state_id',$state_id)
            ->where($status, 'active')
            ->get();
        
        echo json_encode($data);       
    }

    // user add page

    public function changestatus($table,$status_name,$status,$id){

        if( $status=='active'){            
            $data = DB::table($table)
              ->where('id', $id)
              ->update([$status_name."_status" =>'inactive' ]);
              }else{
                $data = DB::table($table)                
                  ->where('id', $id)
                  ->update([$status_name."_status" =>'active' ]);

              }
            if($table=='countries'){
                return redirect()->route('countryIndex');
            }else if($table=='states'){
                return redirect()->route('stateIndex');
            }else{
                return redirect()->route('cityIndex');
            }

    }
    
    public function changepointstatus($status,$id){

        if( $status==1){            
            $data = DB::table('general_settings')
              ->where('id', $id)
              ->update(["status" =>0 ]);
              }else{
                $data = DB::table('general_settings')                
                  ->where('id', $id)
                  ->update(["status" =>1 ]);

              }
            
            return redirect()->route('generalsettingIndex');
          

    }

}
