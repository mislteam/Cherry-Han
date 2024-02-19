<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\CarModel;
use App\Models\CarBrand;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CarOwner;
use App\Models\CarDriver;
use App\Models\CarType;
use Illuminate\Http\Request;
use App\Services\LogWriter;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('cargo.show');

        
        // $countries = Country::where('status','=','active')->get();
        $lists = Cargo::orderBy('id', 'desc')->get();

        return view('pages.cargo.index',compact('lists'));
    }

    public function view($id)
    {
        abort_if_forbidden('cargo.show');
        $cargo = Cargo::find($id);
        return view('pages.cargo.view', compact('cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function add()
    {
        abort_if_forbidden('cargo.add');
        $brands     = CarBrand::get();
        $models     = CarModel::get();
        $countries  = Country::where('cargo_status','=','active')->get();
        $states     = State::where('cargo_status','=','active')->get();
        $cities     = City::where('cargo_status','=','active')->get();
        $ownners    = CarOwner::get();
        $drivers    = CarDriver::get();
        $car_type   = CarType::where('service_type', 'cargo_service')->get();
        return view('pages.cargo.add', compact('brands', 'models', 'countries', 'states', 'cities', 'ownners', 'drivers', 'car_type'));
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
        abort_if_forbidden('cargo.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            /*'brand_id'      => ['required', 'string', 'max:255'],
            'model_id'      => ['required', 'string', 'max:255'],
            'width'         => ['required', 'string', 'max:255'],
            'height'        => ['required', 'string', 'max:255'],
            'length'        => ['required', 'string', 'max:255'],
            'capacity'      => ['required', 'string', 'max:255'],
            'car_type_id'   => ['required', 'string', 'max:255'],
            'country_id'    => ['required', 'string', 'max:255'],
            'state_id'      => ['required', 'string', 'max:255'],
            'city_id'       => ['required', 'string', 'max:255'],
            'service'       => ['required', 'string', 'max:255'],
            'driver_id'     => ['required', 'string', 'max:255'],
            'ownner_id'     => ['required', 'string', 'max:255'],
            'feature_photo' => ['required','mimes:jpg,png','max:4096'],  // max 4MB
            'gallery'       => ['required','max:4096'],  // max 4MB
            'gallery.*'     => ['mimes:jpg,jpeg,png'],
            'license_type'  => ['required', 'string', 'max:255'],
            'wheel_drive'   => ['required', 'string', 'max:255'],*/
        ]);

        $gallery_photo = array();
        $feature_photo = '';
        $upload = false;
        if($request->hasfile('gallery'))
        {
            foreach($request->file('gallery') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/cargo'), $name);
                $gallery_photo[] = $name;
            }
        }

        if($feature_file=$request->file('feature_photo'))
        {
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/cargo'), $feature_photo);
        }

        $new_cargo = Cargo::create([
            'name'          => $request->name,
            'model_id'      => $request->model_id,
            'brand_id'      => $request->brand_id,
            'width'         => $request->width,
            'height'        => $request->height,
            'length'        => $request->length,
            'capacity'      => $request->capicity,
            'city_id'       => $request->city_id,
            'state_id'      => $request->state_id,
            'country_id'    => $request->country_id,
            'car_type_id'   => $request->car_type_id,
            'wheel_drive'   => $request->wheel_drive,
            'license_type'  => $request->license_type,
            'service'       => json_encode($request->service,true),
            'driver_id'     => $request->driver_id,
            'ownner_id'     => $request->ownner_id,
            'feature_photo' => $feature_photo,
            'gallery'       => json_encode($gallery_photo,true),
            'status'        => 'yes',
            'booking_for'   => '',
            'booking_status'=> '',
            'created_by'    => auth()->id(),
        ]);

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew cargo: ".json_encode($new_cargo);

        LogWriter::user_activity($activity,'Addingcargo');

        if (auth()->user()->can('cargo.create'))
            return redirect()->route('cargoIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('cargo.edit');
        $brands     = CarBrand::get();
        $models     = CarModel::get();
        $countries  = Country::where('cargo_status','=','active')->get();
        $states     = State::where('cargo_status','=','active')->get();
        $cities     = City::where('cargo_status','=','active')->get();
        $ownners    = CarOwner::get();
        $drivers    = CarDriver::get();
        $car_type   = CarType::where('service_type', 'cargo_service')->get();
        $cargo = Cargo::find($id);
        return view('pages.cargo.edit',compact('cargo','brands','models','countries','states','cities','ownners','drivers','car_type'));
    }

    // update cargo dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('cargo.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            
        ]);
        $cargo = Cargo::find($id);


        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/cargo'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }

        $gallery_photo=array();

         if(request('old_gallery') !=""){
            $oldgallery = request('old_gallery');
            }else{
               $oldgallery =array();
            }
       
        if($files=$request->file('gallery')){
            foreach($files as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/cargo'), $name);
                $gallery_photo[] = $name;
                
            }

             $gallery=array_merge($oldgallery, $gallery_photo);
           
        }else{
                $gallery = $oldgallery;
            }
 
        $before = $cargo;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates car: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $cargo->fill($request->all());
        $cargo->feature_photo=$feature_photo;
        $cargo->gallery=$gallery;
        $cargo->save();

        $afterCat = $cargo;
        $activity .="\nAfter updates car: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingcargo');

        if (auth()->user()->can('cargo.edit'))
            return redirect()->route('cargoIndex');
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
        abort_if_forbidden('cargo.delete');
        $cargo=Cargo::find($id);
        $cargo->delete();
        return redirect()->route('cargoIndex');
    }
}
