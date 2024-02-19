<?php

namespace App\Http\Controllers\AirTicket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LogWriter;
use App\Models\AirlinesTimeSchedule;
use App\Models\Airline;
use App\Models\AirlinesPriceList;

use App\Models\AirPort;

class AirlineTimeScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('airline-schedule.show');
        $time_schedule = AirlinesTimeSchedule::all();
        return view('pages.airticket.airline_time_schedule_list', compact('time_schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id=0)
    {
        abort_if_forbidden('airline-schedule.add');
        $airline_id = $id;
        $airlines = Airline::all();
        if($id !=0){
            $pricelist = AirlinesPriceList::where('airline_id', $id)->get();
        }else{
            $pricelist = AirlinesPriceList::all();
        }
        $air_port = AirPort::all();
        // dd($pricelist);
        return view('pages.airticket.airline_time_schedule_add', compact('airlines', 'airline_id', 'pricelist', 'air_port'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('airline-schedule.create');
        $this->validate($request, [
            'airline_id' => ['required'],
            'business_type' => ['required'],
            'airline_code' => ['required'],
            'depart_date' => ['required'],
            'depart_time' => ['required'],
            'arrival_time' => ['required'],
            'fromAirport' => ['required'],
            'toAirport' => ['required'],
            'baggage_kg' => ['required'],
            'price_list' => ['required'],
        ]);

        $data = [
            'airline_id'    => $request->airline_id,
            'business_type' => $request->business_type,
            'airline_code'  => $request->airline_code,
            'depart_date'   => $request->depart_date,
            'depart_time'   => $request->depart_time,
            'arrival_time'  => $request->arrival_time,
            'fromAirport'   => $request->fromAirport,
            'toAirport'     => $request->toAirport,
            'baggage_kg'    => $request->baggage_kg,
            'price_list'    => $request->price_list,
            'status'        => 'yes',
            'created_by'    => auth()->id(),
            'updated_by'    => 0,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if_forbidden('airline-schedule.shwo');
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
        abort_if_forbidden('airline-schedule.edit');
        //
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
        abort_if_forbidden('airline-schedule.update');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if_forbidden('airline-schedule.delete');
        //
    }
}
