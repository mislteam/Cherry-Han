<?php

namespace App\Http\Controllers\Container;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\ContainerDestination;
use App\Services\LogWriter;

class ContainerDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('container-destination.show');
        $lists = ContainerDestination::orderBy('id', 'desc')->get();
        return view('pages.containerdestination.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('container-destination.add');
        $states     = State::where('container_status','=','active')->get();
        $containerdestinations=ContainerDestination::all();
        return view('pages.containerdestination.add',compact('containerdestinations','states'));
    }

    public function create(Request $request)
    {
        abort_if_forbidden('container-destination.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);

        $containerdestination = ContainerDestination::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Container Destination: ".json_encode($containerdestination);

        LogWriter::user_activity($activity,'AddingContainerdestination');

        if (auth()->user()->can('containerdestination.create'))
            return redirect()->route('containerdestinationIndex');
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
        abort_if_forbidden('container-destination.edit');
        $states     = State::where('container_status','=','active')->get();
        $containerdestination = ContainerDestination::find($id);
        return view('pages.containerdestination.edit',compact('containerdestination','states'));
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
        abort_if_forbidden('container-destination.edit');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);

        
        $containerdestination = ContainerDestination::find($id);
        $before = $containerdestination;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Container destination: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $containerdestination->fill($request->all());
        $containerdestination->save();

        $afterCat = $containerdestination;
        $activity .="\nAfter updates Container destination: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingcontainerdestination');

        if (auth()->user()->can('containerdestinationp.edit'))
            return redirect()->route('containerdestinationIndex');
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
        abort_if_forbidden('container-destination.delete');
        $containerdestination=ContainerDestination::find($id);
        $containerdestination->delete();
        return redirect()->route('containerdestinationIndex');
    }
}
