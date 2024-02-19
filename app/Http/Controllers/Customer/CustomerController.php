<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ApiUser;
use App\Models\State;
use App\Models\City;
use App\Models\GeneralSetting;
use App\Models\PointSetting;
use App\Models\Token;
use App\Services\LogWriter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // List of users
    public function index()
    {
        abort_if_forbidden('customer.show');
        $generalsetting=GeneralSetting::where('status',0)->get();
        $users = ApiUser::where('isAgent', 'user')->with('tokens')->latest()->get(); //where customer
        return view('pages.customer.index',compact('users','generalsetting'));
    }

    // user add page
    public function add()
    {
        abort_if_forbidden('customer.add');
        return view('pages.customer.add');
    }

    public function toggleUserActivation($id)
    {
        $user = ApiUser::where('id',$id)->first();
        return [
            'is_active' => $user->toggleUserActivation()
        ];
    }

    public function toggleTokenActivation($id)
    {
        $token = Token::where('id',$id)->first();
        return [
            'is_active' => $token->toggleTokenActivation()
        ];
    }

    public function show($id)
    {
        abort_if_forbidden('customer.show');
        $tokens = Token::where('api_user_id',$id)->get();
        return view('pages.customer.show',compact('tokens'));

    }

    // user create
    public function create(Request $request)
    {
        abort_if_forbidden('customer.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'unique:api_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token_valid_period' => ['required', 'integer','max:1000','min:1'],
        ]);

        $user = ApiUser::create(array_merge($request->all(),[
                'created_by' => auth()->id(),
                'isAgent'       => 'user',
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew ApiUser: ".json_encode($user);

        LogWriter::user_activity($activity,'AddingApiUsers');

        return redirect()->route('api-userIndex');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('customer.edit');
        
        $user = ApiUser::find($id);
        $states = State::all();
        $cities = City::where('state_id',$user->state_id)->get();
        return view('pages.customer.edit',compact('user','states','cities'));
    }

    // update user dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('customer.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'unique:api_users,name,'.$id],
            'new_password' => ['nullable', 'string', 'min:8'],
            'confirm_password' => ['same:new_password']
            //'token_valid_period' => ['nullable', 'integer','max:180','min:1'],
        ]);

        $user = ApiUser::find($id);
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates ApiUser: ".logObj($user);

        if (is_null($request->password)) unset($request['password']);
        $user->fill($request->all());
            if($request->new_password !="" && $request->confirm_password !=""){
                $user->password=$request->confirm_password;
            }
        $user->save();

        $activity .="\nAfter updates ApiUser: ".logObj($user);

        LogWriter::user_activity($activity,'EditingApiUsers');

        if (auth()->user()->can('api-user.edit'))
            return redirect()->route('customerIndex');
        else
            return redirect()->route('home');
    }
    
    public function customertoagent(Request $request,$id)
    {
        abort_if_forbidden('customer.edit');

        $user = ApiUser::find($id);

        $label_name=array();
        $label_value=array();

        $count=count($request->label_name);
        $label_name=$request->label_name;
        $label_value=$request->label_value;

      
        for($i=0;$i<$count;$i++){
            $shop_info[ $label_name[$i] ]= $label_value[$i];
        }

        $user->shop_info=json_encode($shop_info,true);
        $user->isAgent='agent';
        $user->save();

        return redirect()->route('agentIndex');

    }

    public function customerpoint(Request $request,$id)
    {

        $general_id=$request->coin_id;
        $collected_point=$request->collected_point; 
        $coin_des=$request->coin_des; 

        $lists=GeneralSetting::find($general_id);
        $coin_type=$lists->name;

        $expiredate=GeneralSetting::find(2);
        $date=$expiredate->value;

        $today=date("Y-m-d",time());
        $expiredate=date("Y-m-d H:i:s",strtotime("+$date days $today"));

        $pointsetting = PointSetting::create([
            'user_id'     => $id,
            'coin_id'     => $general_id,
            'collected_point'     => $collected_point,
            'coin_type'   =>$coin_type,
            'coin_des'    =>$coin_des,
            'use_point'    =>0,
            'point_status' =>"available",
            'coin_expire_date' =>$expiredate,
            'coin_status' =>0,
                  
        ]);
        //dd($pointsetting);exit;
        //return redirect()->route('customerIndex');
        return redirect()->route('pointsettingIndex');

    }
    
    // delete user by id
    public function destroy($id)
    {
        abort_if_forbidden('customer.delete');

        $user = ApiUser::findOrFail($id);
        $user->deleteTokens();
        $user->delete();
        $deleted_by = logObj(auth()->user());
        $user_log = logObj($user);
        $message = "\nDeleted By: $deleted_by\nDeleted user: $user_log";
        LogWriter::user_activity($message,'DeletingApiUsers');
        success_message("$user->name is deleted");
        return redirect()->route('api-userIndex');
    }

    // delete user token by id
    public function destroyToken($id)
    {
        abort_if_forbidden('customer.delete');

        $token = Token::findOrFail($id);
        $token->delete();
        $deleted_by = logObj(auth()->user());
        $user_log = logObj($token);
        $message = "\nDeleted By: $deleted_by\nDeleted user: $user_log";
        LogWriter::user_activity($message,'DeletingApiUsers');
        success_message('Token is deleted');
        return redirect()->back();
    }
}
