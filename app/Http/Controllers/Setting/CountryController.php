<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Services\LogWriter;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('country.show');

        
         //$countries = Country::where('status','=','active')->get();
        $countries = Country::orderBy('name', 'asc')->get();
        return view('pages.country.index',compact('countries'));
    }

    public function add()
    {
        abort_if_forbidden('country.add');       
        return view('pages.country.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('country.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
           
        ]);

        $country = Country::create([
            'name'              => $request->name,
            'code'              => $request->code,
            'phcode'            => $request->phcode,
            'status'            => 'inactive',
            'car_status'        => 'inactive',
            'cargo_status'      => 'inactive',
            'container_status'  => 'inactive',
            'delivery_status'   => 'inactive',
            'busticket_status'  => 'inactive',
            'hotel_status'      => 'inactive',
            'tour_status'       => 'inactive',            
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Country: ".json_encode($country);

        LogWriter::user_activity($activity,'AddingCountry');

        if (auth()->user()->can('country.create'))
            return redirect()->route('countryIndex');
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
        abort_if_forbidden('country.edit');
        $countries = Country::find($id);
        return view('pages.country.edit',compact('countries'));
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
        abort_if_forbidden('country.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'code' => ['string', 'max:255'],
        ]);
        $country = Country::find($id);
        $before = $country;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates country: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $country->fill($request->all());
        $country->save();

        $after = $country;
        $activity .="\nAfter updates Country: ".logObj($after);

        LogWriter::user_activity($activity,'EditingCountry');

        if (auth()->user()->can('country.edit'))
            return redirect()->route('countryIndex');
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
        abort_if_forbidden('country.delete');
        $country=Country::find($id);
        $country->delete();
        return redirect()->route('countryIndex');
    }
}
