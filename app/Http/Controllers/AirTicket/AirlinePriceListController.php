<?php

namespace App\Http\Controllers\AirTicket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirlinesPriceList;
use App\Models\Airline;
use App\Services\LogWriter;

class AirlinePriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('airline-price.add');
        $airline_id = 0;
        $pricing_list = AirlinesPriceList::all();
        return view('pages.airticket.airline_price_list', compact('pricing_list', 'airline_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add($id = 0)
    {
        abort_if_forbidden('airline-price.add');
        $airlines = Airline::all();
        $airline_id = $id;

        return view('pages.airticket.airline_price_list_add', compact('airlines', 'airline_id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('airline-price.create');
        // echo "this is created airline price";
        $this->validate($request,[
            'airline_id'    => ['required'],
            'package_name'  => ['required'],
            'price'         => ['required'],
            'usprice'       => ['required'],
            'isRefund'      => ['required'],
            'refund_description' => ['required']
        ]);

        $data = [
            'package_name'  => $request->package_name,
            'airline_id'    => $request->airline_id,
            'price'         => $request->price,
            'usprice'       => $request->usprice,
            'isRefund'      => $request->isRefund,
            'refund_description' => $request->refund_description,
            'status'        => 'yes',
            'updated_by'    => 0,
            'created_by'    => auth()->id(),
        ];

        // dd($data);
        $pricelist = AirlinesPriceList::create($data);

        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Airline Pricing List: ".json_encode($pricelist);

        LogWriter::user_activity($activity,'AddingAirlinePriceList');

        if (auth()->user()->can('airline-price.create'))
            return redirect()->route('airlinepricelistIndex');
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
        abort_if_forbidden('airline-price.edit');
        $airlines = Airline::all();
        $pricelist = AirlinesPriceList::find($id);
        return view('pages.airticket.airline_price_list_edit', compact('airlines', 'pricelist'));
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
        abort_if_forbidden('airline-price.edit');
        $this->validate($request,[
            'airline_id'    => ['required'],
            'package_name'  => ['required'],
            'price'         => ['required'],
            'usprice'       => ['required'],
            'isRefund'      => ['required'],
            'refund_description' => ['required']
        ]);


        $pricelist = AirlinesPriceList::find($id);
        $before = $pricelist;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates airline price list: ".logObj($before);

        $pricelist->fill($request->all());
        $pricelist->refund_description = html_entity_decode($request->refund_description);
        $pricelist->updated_by =  auth()->id();
        $pricelist->updated_at = time();

        $pricelist->save();

        $afterSave = $pricelist;
        $activity .="\nAfter updates airline price list: ".logObj($afterSave);

        LogWriter::user_activity($activity, 'EditingAirlinePriceList');

        if (auth()->user()->can('airline-price.edit'))
            return redirect()->route('airlinepricelistIndex');
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
}
