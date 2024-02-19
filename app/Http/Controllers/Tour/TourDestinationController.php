<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourDestination;
use App\Services\LogWriter;

class TourDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('tour-destination.show');
        $lists = TourDestination::orderBy('id', 'desc')->get();
        return view('pages.tourdestination.index',compact('lists'));
    }

    public function add()
    {
        abort_if_forbidden('tour-destination.add');
        return view('pages.tourdestination.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('tour-destination.create');

         $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
           
        ]);

        $feature_photo = '';
        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/tourdestination'), $feature_photo);
        }

        $tourdestination = TourDestination::create([
            'name'          => $request->name,   
            'description'          => $request->description,   
            'feature_photo'    => $feature_photo,        
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Tour Destination: ".json_encode($tourdestination);

        LogWriter::user_activity($activity,'Addingtourdestination');

        if (auth()->user()->can('tour-destination.create'))
            return redirect()->route('tourdestinationIndex');
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
        abort_if_forbidden('tour-destination.edit');
        $tourdestinations = TourDestination::find($id);
        return view('pages.tourdestination.edit',compact('tourdestinations'));
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
        abort_if_forbidden('tour-destination.edit');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/tourdestination'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }

        $tourdestination = TourDestination::find($id);
        $before = $tourdestination;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Tour destination: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $tourdestination->fill($request->all());
        $tourdestination->feature_photo=$feature_photo;
        $tourdestination->save();

        $afterCat = $tourdestination;
        $activity .="\nAfter updates Tour destination: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingtourdestination');

        if (auth()->user()->can('tour-destination.edit'))
            return redirect()->route('tourdestinationIndex');
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
        abort_if_forbidden('tour-destination.delete');
        $tourdestination=TourDestination::find($id);
        $tourdestination->delete();
        return redirect()->route('tourdestinationIndex');
    }
}
