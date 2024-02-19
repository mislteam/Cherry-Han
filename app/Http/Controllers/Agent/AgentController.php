<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiUser;
use App\Models\State;
use App\Models\City;
use App\Models\Token;
use App\Models\GeneralSetting;
use App\Services\LogWriter;

class AgentController extends Controller
{
    // List of users
    public function index()
    {
        abort_if_forbidden('agent.show');
        $generalsetting=GeneralSetting::where('id',1)->orwhere('id',3)->get();
        $users = ApiUser::where('isAgent', 'agent')->with('tokens')->latest()->get();
        return view('pages.agent.index',compact('users','generalsetting'));
    }

    // user add page
    public function add()
    {
        abort_if_forbidden('agent.add');
        $states=State::all();
        return view('pages.agent.add',compact('states'));
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
        abort_if_forbidden('agent.show');
        $tokens = Token::where('api_user_id',$id)->get();
        return view('pages.agent.show',compact('tokens'));

    }

    // user create
    public function create(Request $request)
    {

       // dd(json_encode($shop_info,true));
       // abort_if_forbidden('agent.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'unique:api_users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'token_valid_period' => ['required', 'integer','max:1000','min:1'],
        ]);

        $label_name=array();
        $label_value=array();

        $count=count($request->label_name);
        $label_name=$request->label_name;
        $label_value=$request->label_value;

      
        for($i=0;$i<$count;$i++){
            $shop_info[ $label_name[$i] ]= $label_value[$i];
        }
  

        /*$user = ApiUser::create(array_merge($request->all(),[
            'created_by'    => auth()->id(),
            'isAgent'       => 'agent',
            ]));*/

         $user = ApiUser::create([
            'name'       => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'state_id'    => $request->state_id,
            'city_id'      =>$request->city_id,
            'address'   => $request->address,
            'password'   => $request->confirm_password,
            'status'   => 'agent',
            'is_active'   => 0,
            'isAgent'   => 'agent',
            'shop_info'   => json_encode($shop_info,true),
            'created_by'    => auth()->id(),
        ]);
    //dd($user);exit;


        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew ApiUser: ".json_encode($user);

        LogWriter::user_activity($activity,'AddingApiUsers');

        return redirect()->route('agentIndex');
    }
    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('agent.edit');
        $user = ApiUser::find($id);
        return view('pages.agent.edit',compact('user'));
    }

    // update user dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('agent.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'unique:api_users,name,'.$id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'token_valid_period' => ['nullable', 'integer','max:180','min:1'],
        ]);

        $user = ApiUser::find($id);
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates ApiUser: ".logObj($user);

        if (is_null($request->password)) unset($request['password']);
        $user->fill($request->all());
        $user->save();

        $activity .="\nAfter updates ApiUser: ".logObj($user);

        LogWriter::user_activity($activity,'EditingApiUsers');

        if (auth()->user()->can('agent.edit'))
            return redirect()->route('api-userIndex');
        else
            return redirect()->route('home');
    }

    // delete user by id
    public function destroy($id)
    {
        abort_if_forbidden('agent.delete');

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
        abort_if_forbidden('agent.delete');

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
