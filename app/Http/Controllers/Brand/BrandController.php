<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LogWriter;
use Illuminate\Support\Facades\DB;

use App\Models\CarBrand;
use App\Models\CarModel;

class BrandController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('car-brand.show');


        // $countries = Country::where('status','=','active')->get();
        $lists = CarBrand::orderBy('id', 'asc')->get();

        return view('pages.carbrand.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('car-brand.add');
        return view('pages.carbrand.add');
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
        abort_if_forbidden('car-brand.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);

        $user = CarBrand::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Car Brand: ".json_encode($user);

        LogWriter::user_activity($activity,'AddingCarBrand');

        if (auth()->user()->can('carbrand.create'))
            return redirect()->route('carbrandIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('car-brand.edit');
        $carbrand = CarBrand::find($id);
        return view('pages.carbrand.edit', compact('carbrand'));
    }

    // update CarBrand dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('car-brand.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);
        $carbrand = CarBrand::find($id);
        $before = $carbrand;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Car Brand: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $carbrand->fill($request->all());
        $carbrand->save();

        $afterCat = $carbrand;
        $activity .="\nAfter updates Car Brand: ".logObj($afterCat);

        LogWriter::user_activity($activity,'EditingCarBrand');

        if (auth()->user()->can('carbrand.edit'))
            return redirect()->route('carbrandIndex');
        else
            return redirect()->route('home');
    }

    public function getbrandmodel(Request $request)
    {
        $brand_id = $request->brand_id;
        //$data = CarModel::where('brand_id','=',$brand_id)->get();
        $data = DB::table('car_models')
             ->where('brand_id',$brand_id)
            ->get();          
        echo json_encode($data);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            abort_if_forbidden('car-brand.delete');
        $brand=CarBrand::find($id);
        $brand->delete();
        return redirect()->route('carbrandIndex');
        
    }
}
