<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarDriver;
use App\Services\LogWriter;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CardriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('car-driver.show');
        $lists = CarDriver::orderBy('id', 'desc')->get();
        return view('pages.cardriver.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('car-driver.add');
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        $gender = array('male' => "male",'female' => "female" );
        
        return view('pages.cardriver.add',compact('countries', 'states', 'cities', 'gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('car-driver.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            'email'          => ['string', 'max:255'],
            'phone'       => ['required', 'max:255'],  // max 4MB
        ]);

        $car_driver = CarDriver::create([
            'name'          => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'         => $request->address,
            'language'         => json_encode($request->language,true),
            'age'         => $request->age,
            'gender'         => $request->gender,
            'tour_exp'         => $request->tour_exp,
            'drive_exp'         => $request->drive_exp,
            'license_type'         => $request->license_type,
            'city_id'       => $request->city_id,
            'state_id'      => $request->state_id,
            'country_id'    => $request->country_id,
            'status'        => 'yes',
            'rating'        => 0,
            'demage'        => 'no',
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew cardriver: ".json_encode($car_driver);

        LogWriter::user_activity($activity,'Addingcardriver');

        if (auth()->user()->can('car-driver.add'))
            return redirect()->route('cardriverIndex');
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
        abort_if_forbidden('car-driver.edit');
        $cardriver = CarDriver::find($id);
        $countries = Country::get();
        $states = State::where('country_id',$cardriver->country_id)->get();
        $cities = City::where('state_id',$cardriver->state_id)->get();
        $gender = array('male' => "male",'female' => "female" );
        
        return view('pages.cardriver.edit',compact('cardriver','states','cities','countries','gender'));
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
        abort_if_forbidden('car-driver.edit');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'max:255'],
        ]);
        $cardriver = CarDriver::find($id);
        $before = $cardriver;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates cardriver: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $cardriver->fill($request->all());
        $cardriver->save();

        $afterCat = $cardriver;
        $activity .="\nAfter updates carowner: ".logObj($afterCat);

        LogWriter::user_activity($activity,'EditingCarDriver');

        if (auth()->user()->can('car-driver.edit'))
            return redirect()->route('cardriverIndex');
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
        abort_if_forbidden('car-driver.delete');
        $cardriver=CarDriver::find($id);
        $cardriver->delete();
        return redirect()->route('cardriverIndex')->with('success',' Delete Successfully');
    }
}
