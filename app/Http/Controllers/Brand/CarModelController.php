<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\LogWriter;

use App\Models\CarModel;
use App\Models\CarBrand;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('car-model.show');


        // $countries = Country::where('status','=','active')->get();
        $lists = CarModel::orderBy('id', 'asc')->get();
        // $lists = CarModel::with(['car_brands'])->get();
        // dd($lists);
        return view('pages.carmodel.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('car-model.add');
        $brands = CarBrand::orderBy('id', 'asc')->get();
        return view('pages.carmodel.add', compact('brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // user create
    public function create(Request $request)
    {
        abort_if_forbidden('car-model.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);

        $user = CarModel::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Car Model: ".json_encode($user);

        LogWriter::user_activity($activity,'AddingCarModel');

        if (auth()->user()->can('carmodel.create'))
            return redirect()->route('carmodelIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('car-model.edit');
        $brands = CarBrand::orderBy('id', 'asc')->get();
        $carmodel = CarModel::find($id);
        return view('pages.carmodel.edit', compact('carmodel', 'brands'));
    }

    // update CarModel dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('car-model.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);
        $carmodel = CarModel::find($id);
        $before = $carmodel;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Car Model: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $carmodel->fill($request->all());
        $carmodel->save();

        $afterCat = $carmodel;
        $activity .="\nAfter updates Car Model: ".logObj($afterCat);

        LogWriter::user_activity($activity,'EditingCarModel');

        if (auth()->user()->can('carmodel.edit'))
            return redirect()->route('carmodelIndex');
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
         abort_if_forbidden('car-model.delete');
        $carmodel = CarModel::find($id);
        $carmodel->delete();
        return redirect()->route('carmodelIndex');
    }
}
