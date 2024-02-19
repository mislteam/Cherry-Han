<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\LogWriter;
use App\Models\BusGate;

class BusGateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('bus-gate.show');

        // $countries = Country::where('status','=','active')->get();
        $lists = BusGate::orderBy('id', 'desc')->get();
        // dd($lists);
        return view('pages.busgate.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('bus-gate.add');
        
        /*$countries = Country::get();
        $states = State::get();
        $cities = City::get();*/
        $busgates = BusGate::get();
        
        return view('pages.busgate.add',compact('busgates'));
    }

    public function create(Request $request)
    {
        abort_if_forbidden('bus-gate.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            'email'          => ['string', 'max:255'],
            'phone'       => ['required', 'max:255'],  // max 4MB
        ]);

        $bus_gate = BusGate::create([
            'name'          => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'         => $request->address,
            'note'    => $request->note,
            'status'        => 'yes',
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew busgate: ".json_encode($bus_gate);

        LogWriter::user_activity($activity,'Addingbusgate');

        if (auth()->user()->can('bus_gate.create'))
            return redirect()->route('busgateIndex');
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
        abort_if_forbidden('bus-gate.edit');
        /*$countries = Country::get();
        $states = State::get();
        $cities = City::get();*/
        $busgate = BusGate::find($id);
        return view('pages.busgate.edit',compact('busgate'));
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
        abort_if_forbidden('bus-gate.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'max:255'],
        ]);
        $busgate = BusGate::find($id);
        $before = $busgate;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates busgate: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $busgate->fill($request->all());
        $busgate->save();

        $afterCat = $busgate;
        $activity .="\nAfter updates busgate: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingbusgate');

        if (auth()->user()->can('bus_gate.edit'))
            return redirect()->route('busgateIndex');
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
        abort_if_forbidden('bus-gate.delete');
        $busgates=BusGate::find($id);
        $busgates->delete();
        return redirect()->route('busgateIndex');
    }
}
