<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;

use App\Models\BusTicket;
use App\Models\BusGate;
use App\Models\BusDestination;

use Illuminate\Http\Request;
use App\Services\LogWriter;
use Illuminate\Support\Facades\DB;

class BusTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('bus-ticket.show');

        // $countries = Country::where('status','=','active')->get();
        $lists = BusTicket::orderBy('id', 'desc')->get();
        // dd($lists);
        return view('pages.busticket.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('bus-ticket.add');
        
        /*$countries  = Country::where('status','=','active')->get();
        $states     = State::where('busticket_status','=','active')->get();
        $cities     = City::where('busticket_status','=','active')->get();*/
        $busdestinations=BusDestination::all();
        $busgates   = BusGate::get();
        
        return view('pages.busticket.add',compact('busdestinations','busgates'));
    }

    public function create(Request $request)
    {
        abort_if_forbidden('bus-ticket.create');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            'email'          => ['string', 'max:255'],
            'phone'       => ['required', 'max:255'],  // max 4MB
        ]);

        $feature_photo = '';
        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/busticket'), $feature_photo);
        }

        $bus_ticket = BusTicket::create([
            'name'          => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'         => $request->address,
            'bus_gate_id'    => $request->bus_gate_id,
            'destination_id' => json_encode($request->bus_destination_id,true),
            'bus_type'    => $request->bus_type,
            'price'    => $request->price,
            'no_seat'    => $request->seat_no,
            'feature_photo'    => $feature_photo,
            'available_seat'    => $request->available_seat,
            'note'    => $request->note,
            'status'        => 'yes',
            'updated_by'    => 0,
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew busticket: ".json_encode($bus_ticket);

        LogWriter::user_activity($activity,'Addingbusticket');

        if (auth()->user()->can('bus-ticket.create'))
            return redirect()->route('busticketIndex');
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
     * @param  \App\Models\BusTicket  $busTicket
     * @return \Illuminate\Http\Response
     */
    public function show(BusTicket $busTicket)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusTicket  $busTicket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if_forbidden('bus-ticket.edit');
        
        
        $busgates   = BusGate::get();
        $busdestinations=BusDestination::all();
        $bustickets = BusTicket::find($id);
        
        return view('pages.busticket.edit',compact('busdestinations','busgates','bustickets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusTicket  $busTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort_if_forbidden('bus-ticket.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'max:255'],
        ]);
        
        
        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/busticket'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }

        $busticket = BusTicket::find($id);
        $before = $busticket;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates busticket: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $busticket->fill($request->all());
        $busticket->destination_id=json_encode($request->bus_destination_id,true);
        $busticket->feature_photo=$feature_photo;
        $busticket->save();

        $afterCat = $busticket;
        $activity .="\nAfter updates busticket: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingbusticket');

        if (auth()->user()->can('bus_ticket.edit'))
            return redirect()->route('busticketIndex');
        else
            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusTicket  $busTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if_forbidden('bus-ticket.delete');
        $busticket=BusTicket::find($id);
        $busticket->delete();
        return redirect()->route('busticketIndex');
    }
}
