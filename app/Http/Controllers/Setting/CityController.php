<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Services\LogWriter;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('city.show');

        
        // $cities = City::where('status','=','active')->get();
        $cities = City::orderBy('name', 'asc')->get();

        return view('pages.city.index',compact('cities'));
    }

    public function add()
    {
        abort_if_forbidden('city.add'); 
        $countries=Country::all();  
        $states=State::all();     
        return view('pages.city.add',compact('states','countries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('city.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
           
        ]);

        $city = City::create([
            'name'      => $request->name,
            'country_id'      => $request->country_id,
            'state_id'      => $request->state_id,
            'status'    => 'inactive',
            'car_status'        => 'inactive',
            'cargo_status'      => 'inactive',
            'container_status'  => 'inactive',
            'delivery_status'   => 'inactive',
            'busticket_status'  => 'inactive',
            'hotel_status'      => 'inactive',
            'tour_status'       => 'inactive',
            
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew city: ".json_encode($city);

        LogWriter::user_activity($activity,'AddingCity');

        if (auth()->user()->can('city.create'))
            return redirect()->route('cityIndex');
        else
            return redirect()->route('home');
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
        abort_if_forbidden('city.edit');
        $countries = Country::all();
        $states = State::all();
        $city = City::find($id);
        return view('pages.city.edit',compact('city','states','countries'));
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
        abort_if_forbidden('city.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);
        $city = City::find($id);
        $before = $city;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates City: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $city->fill($request->all());
        $city->save();

        $after = $city;
        $activity .="\nAfter updates city: ".logObj($after);

        LogWriter::user_activity($activity,'Editingcity');

        if (auth()->user()->can('city.edit'))
            return redirect()->route('cityIndex');
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
        abort_if_forbidden('city.delete');
        $city=City::find($id);
        $city->delete();
        return redirect()->route('cityIndex');
    }
}
