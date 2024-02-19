<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelRoomTypeCategory;
use App\Services\LogWriter;

class RoomTypeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('roomtypecategory.show');
        $lists = HotelRoomTypeCategory::orderBy('id', 'desc')->get();
        return view('pages.roomtypecategory.index',compact('lists'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('roomtypecategory.add');
        return view('pages.roomtypecategory.add');
    }

    public function create(Request $request)
    {
        abort_if_forbidden('roomtypecategory.create');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            
        ]);

        $roomtypecat = HotelRoomTypeCategory::create([
            'name'          => $request->name,           
            'description'         => $request->description,
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew roomtypecategory: ".json_encode($roomtypecat);

        LogWriter::user_activity($activity,'Addingroomtypecategory');

        if (auth()->user()->can('roomtypecategory.create'))
            return redirect()->route('roomtypecategoryIndex');
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
        abort_if_forbidden('roomtypecategory.edit');
        $roomtypecats=HotelRoomTypeCategory::find($id);
        return view('pages.roomtypecategory.edit',compact('roomtypecats'));
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
        //bort_if_forbidden('roomtypecategory.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);
        $roomtypecat = HotelRoomTypeCategory::find($id);
        $before = $roomtypecat;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates carowner: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $roomtypecat->fill($request->all());
        $roomtypecat->save();

        $afterCat = $roomtypecat;
        $activity .="\nAfter updates roomtypecategory: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingroomtypecategory');

        if (auth()->user()->can('roomtypecategory.edit'))
            return redirect()->route('roomtypecategoryIndex');
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
        $roomtypecat=HotelRoomTypeCategory::find($id);
        $roomtypecat->delete();
        return redirect()->route('roomtypecategoryIndex');
    }
}
