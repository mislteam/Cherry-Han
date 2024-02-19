<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelRoomType;
use App\Models\Hotel;
use App\Services\LogWriter;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('roomtype.show');
        $lists = HotelRoomType::orderBy('id', 'asc')->get();
        return view('pages.roomtype.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('roomtype.add');
        $hotels=Hotel::all();
        return view('pages.roomtype.add',compact('hotels'));
    }

    public function create(Request $request)
    {
        abort_if_forbidden('roomtype.create');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            
        ]);

        $roomtype = HotelRoomType::create([
            'room_name'          => $request->name,           
            'description'         => $request->description,
            'price'         => $request->price,
            'hotel_id'         => $request->hotel_id,
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew roomtype: ".json_encode($roomtype);

        LogWriter::user_activity($activity,'Addingroomtype');

        if (auth()->user()->can('roomtype.create'))
            return redirect()->route('roomtypeIndex');
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
        abort_if_forbidden('roomtype.edit');
        $roomtypes=HotelRoomType::find($id);
        $hotels=Hotel::all();
        return view('pages.roomtype.edit',compact('roomtypes','hotels'));
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
        //abort_if_forbidden('roomtype.edit');

        $this->validate($request,[
            'room_name' => ['required', 'string', 'max:255'],
        ]);
        $roomtype = HotelRoomType::find($id);
        $before = $roomtype;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates roomtype: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $roomtype->fill($request->all());
        $roomtype->save();

        $afterCat = $roomtype;
        $activity .="\nAfter updates roomtype: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingroomtype');

        if (auth()->user()->can('roomtype.edit'))
            return redirect()->route('roomtypeIndex');
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
        $roomtype=HotelRoomType::find($id);
        $roomtype->delete();
        return redirect()->route('roomtypeIndex');
    }
}
