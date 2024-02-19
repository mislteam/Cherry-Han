<?php

namespace App\Http\Controllers\AirTicket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Airline;
use App\Models\AirPort;
use App\Services\LogWriter;

class AirTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('airline.show');

        // $countries = Country::where('status','=','active')->get();
        $lists = Airline::orderBy('id', 'desc')->get();
        // dd($lists);
        return view('pages.airticket.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('airline.add');
        return view('pages.airticket.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('airline.create');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            'feature_photo' => ['required'],
            // 'email'          => ['string', 'max:255'],
            // 'phone'       => ['required', 'max:255'],  // max 4MB
        ]);

        $feature_photo = '';
        if($feature_file=$request->file('feature_photo'))
        {

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/airline'), $feature_photo);
        }

        $airline = Airline::create([
            'name'          => $request->name,
            // 'phone'      => $request->phone,
            // 'email'      => $request->email,
            // 'address'         => $request->address,
            'feature_photo' => $feature_photo,
            'status'        => 'yes',
            'updated_by'    => 0,
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Airline: ".json_encode($airline);

        LogWriter::user_activity($activity,'AddingAirline');

        if (auth()->user()->can('airline.create'))
            return redirect()->route('airlineIndex');
        else
            return redirect()->route('home');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if_forbidden('airline.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if_forbidden('airline.edit');
        $airline = Airline::find($id);
        return view('pages.airticket.edit', compact('airline'));
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
        abort_if_forbidden('airline.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            // 'feature_photo' => ['required'],
        ]);
        $old_feature_photo = request('old_feature_photo');

        if($feature_file=$request->file('feature_photo'))
        {
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/airline'), $feature_photo);

            $image_path = "feature/airline/{old_feature_photo}";
            if (file_exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
        }else{
            $feature_photo = request('old_feature_photo');
        }

        $airline = Airline::find($id);
        $before = $airline;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates airline: ".logObj($before);

        // if (is_null($request->password)) unset($request['password']);
        $airline->fill($request->all());
        $airline->feature_photo = $feature_photo;
        $airline->updated_by =  auth()->id();
        $airline->updated_at = time();

        $airline->save();
        // dd($airline);
        $afterSave = $airline;
        $activity .="\nAfter updates airline: ".logObj($afterSave);

        LogWriter::user_activity($activity, 'EditingAirline');

        if (auth()->user()->can('airline.edit'))
            return redirect()->route('airlineIndex');
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
        //
    }

    public function airport_list(){
        abort_if_forbidden('air-port.show');
        $airport = AirPort::all();
        return view('pages.airticket.airport_list', compact('airport'));
    }

    public function airport_show($id){
        abort_if_forbidden('air-port.show');
        $airport = AirPort::find($id);
        return view('pages.airticket.airport_show', compact('airport'));
    }
    public function airport_add(){
        abort_if_forbidden('air-port.add');

        return view('pages.airticket.airport_add');
    }
    public function airport_create(Request $request){
        abort_if_forbidden('air-port.create');

        if (auth()->user()->can('air-port.create'))
            return redirect()->route('airportIndex');
        else
            return redirect()->route('home');
    }
    public function airport_edit($id){
        abort_if_forbidden('air-port.edit');

        return view('pages.airticket.airport_edit', compact('airport'));
    }
    public function airport_update(Request $request, $id){
        abort_if_forbidden('air-port.update');

        if (auth()->user()->can('air-port.update'))
            return redirect()->route('airportIndex');
        else
            return redirect()->route('home');
    }
    public function airport_destory(){
        abort_if_forbidden('air-port.delete');

        if (auth()->user()->can('air-port.delete'))
            return redirect()->route('airportIndex');
        else
            return redirect()->route('home');
    }
}
