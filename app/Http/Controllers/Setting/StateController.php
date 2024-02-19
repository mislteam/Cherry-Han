<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use App\Services\LogWriter;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('state.show');

        // $states = state::where('status','=','active')->get();
        $states = State::orderBy('name', 'asc')->get();

        return view('pages.state.index',compact('states'));
    }

     public function add()
    {
        abort_if_forbidden('state.add'); 
        $countries=Country::all();      
        return view('pages.state.add',compact('countries'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('state.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
           
        ]);

        $state = State::create([
            'name'              => $request->name,
            'country_id'        => $request->country_id,
            'status'            => 'active',
            'car_status'        => 'inactive',
            'cargo_status'      => 'inactive',
            'container_status'  => 'inactive',
            'delivery_status'   => 'inactive',
            'busticket_status'  => 'inactive',
            'hotel_status'      => 'inactive',
            'tour_status'       => 'inactive',
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew State: ".json_encode($state);

        LogWriter::user_activity($activity,'AddingState');

        if (auth()->user()->can('state.create'))
            return redirect()->route('stateIndex');
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
        abort_if_forbidden('state.edit');
        $countries = Country::all();
        $state = State::find($id);
        return view('pages.state.edit',compact('state','countries'));
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
        abort_if_forbidden('state.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);
        $state = State::find($id);
        $before = $state;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates state: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $state->fill($request->all());
        $state->save();

        $after = $state;
        $activity .="\nAfter updates state: ".logObj($after);

        LogWriter::user_activity($activity,'Editingstate');

        if (auth()->user()->can('state.edit'))
            return redirect()->route('stateIndex');
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
         abort_if_forbidden('state.delete');
        $state=State::find($id);
        $state->delete();
        return redirect()->route('stateIndex');
    }
}
