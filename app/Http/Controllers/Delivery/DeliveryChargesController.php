<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LogWriter;
use App\Models\DeliveryCharges;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class DeliveryChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('delivery-charges.show');
        $lists = DeliveryCharges::orderBy('id', 'desc')->get();
        // dd($lists);
        return view('pages.deliverycharges.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('delivery-charges.add');   
        //$countries = Country::get();
        //$states = State::get();
        //$cities = City::get();
        $countries  = Country::where('delivery_status','=','active')->get();
        $states     = State::where('delivery_status','=','active')->get();
        $cities     = City::where('delivery_status','=','active')->get();
      
        return view('pages.deliverycharges.add',compact('countries', 'states', 'cities'));
    }

   
    public function create(Request $request)
    {
        abort_if_forbidden('delivery-charges.add');

         $this->validate($request,[
            'price'  => ['required', 'string', 'max:255'],
           
        ]);

        $deliverycharges = DeliveryCharges::create([
            'country_id' => $request->country_id,           
            'state_id'   => $request->state_id,           
            'city_id'    => $request->city_id,           
            'price'      => $request->price,           
            'weight'     => $request->weight,           
            'created_by' => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew deliverycharges: ".json_encode($deliverycharges);

        LogWriter::user_activity($activity,'Addingdeliverycharges');

        if (auth()->user()->can('deliverycharges.create'))
            return redirect()->route('deliverychargesIndex');
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
        abort_if_forbidden('delivery-charges.edit');   
        $countries  = Country::where('delivery_status','=','active')->get();
        $states     = State::where('delivery_status','=','active')->get();
        $cities     = City::where('delivery_status','=','active')->get();
        $deliverycharges=DeliveryCharges::find($id);
      
        return view('pages.deliverycharges.edit',compact('deliverycharges','countries', 'states', 'cities'));
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
        abort_if_forbidden('delivery-charges.edit');

        $this->validate($request,[
            'price' => ['required', 'string', 'max:255'],
        ]);
        $deliverycharges = DeliveryCharges::find($id);
        $before = $deliverycharges;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates deliverycharges: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $deliverycharges->fill($request->all());
        $deliverycharges->save();

        $afterCat = $deliverycharges;
        $activity .="\nAfter updates deliverycharges: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingdeliverycharges');

        if (auth()->user()->can('deliverycharges.edit'))
            return redirect()->route('deliverychargesIndex');
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
        abort_if_forbidden('delivery-charges.delete');
        $deliverycharges=DeliveryCharges::find($id);
        $deliverycharges->delete();
        return redirect()->route('deliverychargesIndex');
    }
}
