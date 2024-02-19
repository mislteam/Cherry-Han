<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarOwner;
use App\Services\LogWriter;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CarOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if_forbidden('car-owner.show');

        // $countries = Country::where('status','=','active')->get();
        $lists = CarOwner::orderBy('id', 'desc')->get();
       return view('pages.carowner.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        abort_if_forbidden('car-owner.add');
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        
        return view('pages.carowner.add',compact('countries', 'states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
       abort_if_forbidden('car-owner.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            'email'          => ['string', 'max:255'],
            'phone'       => ['required', 'max:255'],  // max 4MB
        ]);
        
         $feature_photo = '';
        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/carowner'), $feature_photo);
        }

        $car_owner = CarOwner::create([
            'name'          => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'         => $request->address,
            'city_id'       => $request->city_id,
            'state_id'      => $request->state_id,
            'country_id'    => $request->country_id,
            'feature_photo'  => $feature_photo,
            'status'        => 'yes',
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew CarOwner: ".json_encode($car_owner);

        LogWriter::user_activity($activity,'AddingCarOwner');

        if (auth()->user()->can('car-owner.create'))
            return redirect()->route('carownerIndex');
        else
            return redirect()->route('home');
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
        abort_if_forbidden('car-owner.edit');
        $carowner = CarOwner::find($id);
        $countries = Country::get();
        $states = State::where('country_id',$carowner->country_id)->get();
        $cities = City::where('state_id',$carowner->state_id)->get();
        
        return view('pages.carowner.edit',compact('carowner','states','cities','countries'));
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
        abort_if_forbidden('car-owner.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'max:255'],
        ]);
        
         if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/carowner'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }
        
        $carowner = CarOwner::find($id);
        $before = $carowner;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates carowner: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $carowner->fill($request->all());
        $carowner->feature_photo=$feature_photo;
        $carowner->save();

        $after = $carowner;
        $activity .="\nAfter updates CarOwner: ".logObj($after);

        LogWriter::user_activity($activity,'EditingCarOwner');

        if (auth()->user()->can('car-owner.edit'))
            return redirect()->route('carownerIndex');
        else
            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carowner=CarOwner::find($id);
        $carowner->delete();
        return redirect()->route('carownerIndex')->with('success','CarOwner Delete Successfully');
    }
}
