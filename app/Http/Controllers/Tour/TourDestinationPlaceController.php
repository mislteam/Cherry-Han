<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourDestination;
use App\Models\TourDestinationPlace;
use App\Services\LogWriter;

class TourDestinationPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('tour-destination-place.show');
        $lists = TourDestinationPlace::orderBy('id', 'desc')->get();
        return view('pages.tourdestinationplace.index',compact('lists'));
    }

    public function add()
    {
        abort_if_forbidden('tour-destination-place.add');
        $tourdestinations=TourDestination::all();
        return view('pages.tourdestinationplace.add',compact('tourdestinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('tour-destination-place.add');

         $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
           
        ]);

        $feature_photo = '';
        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/tourdestinationplace'), $feature_photo);
        }

        $tourdestinationplace = TourDestinationPlace::create([
            'name'                 => $request->name,   
            'description'          => $request->description,   
            'tour_destination_id'  => $request->tour_destination_id,   
            'feature_photo'        => $feature_photo,        
            'created_by'           => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Tour Destination Place: ".json_encode($tourdestinationplace);

        LogWriter::user_activity($activity,'Addingtourdestinationplace');

        if (auth()->user()->can('tourdestinationplace.create'))
            return redirect()->route('tourdestinationplaceIndex');
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
        abort_if_forbidden('tour-destination-place.edit');
        $tourdestinations=TourDestination::all();
        $tourdestinationplaces = TourDestinationPlace::find($id);
        return view('pages.tourdestinationplace.edit',compact('tourdestinations','tourdestinationplaces'));
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
        abort_if_forbidden('tour-destination-place.edit');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/tourdestinationplace'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }

        $tourdestinationplace = TourDestinationPlace::find($id);
        $before = $tourdestinationplace;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Tour destination place: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $tourdestinationplace->fill($request->all());
        $tourdestinationplace->feature_photo=$feature_photo;
        $tourdestinationplace->save();

        $afterCat = $tourdestinationplace;
        $activity .="\nAfter updates Tour destination place: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingtourdestinationplace');

        if (auth()->user()->can('tourdestinationplace.edit'))
            return redirect()->route('tourdestinationplaceIndex');
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
        abort_if_forbidden('tour-destination-place.delete');
        $tourdestinationplace=TourDestinationPlace::find($id);
        $tourdestinationplace->delete();
        return redirect()->route('tourdestinationplaceIndex');
    }
}
