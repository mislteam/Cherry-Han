<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusDestination;
use App\Services\LogWriter;

class BusDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('bus-destination.show');
        $lists=BusDestination::all();
        return view('pages.bus_destination.index', compact('lists'));
    }

    public function add()
    {
        abort_if_forbidden('bus-destination.add');
        
        return view('pages.bus_destination.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('bus-destination.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            
        ]);

        $bus_destination = BusDestination::create([
            'name'          => $request->name,
            
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew busdestination: ".json_encode($bus_destination);

        LogWriter::user_activity($activity,'Addingbusdestination');

        if (auth()->user()->can('bus_destination.create'))
            return redirect()->route('busdestinationIndex');
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
        abort_if_forbidden('bus-destination.edit');
        
        $busdestination = BusDestination::find($id);
        return view('pages.bus_destination.edit',compact('busdestination'));
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
        abort_if_forbidden('bus-destination.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            
        ]);
        $busdestination = BusDestination::find($id);
        $before = $busdestination;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates busdestination: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $busdestination->fill($request->all());
        $busdestination->save();

        $afterCat = $busdestination;
        $activity .="\nAfter updates busdestination: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingbusdestination');

        if (auth()->user()->can('bus_destination.edit'))
            return redirect()->route('busdestinationIndex');
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
        abort_if_forbidden('bus-destination.delete');

        $busdestination=BusDestination::find($id);
        $busdestination->delete();
        return redirect()->route('busdestinationIndex');
    }
}
