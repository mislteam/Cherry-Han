<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Services\LogWriter;

use App\Models\CarBrand;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CarOwner;
use App\Models\CarDriver;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('car.show');

        // $countries = Country::where('status','=','active')->get();
        $lists = Car::orderBy('id', 'desc')->get();
        // dd($lists);
       return view('pages.cars.index',compact('lists'));
    }

    public function view($id)
    {
        abort_if_forbidden('car.show');
        $car = Car::find($id);
        return view('pages.cars.view', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('car.add');
        $brands     = CarBrand::get();
        $models     = CarModel::get();
        $cartypes   = CarType::where('service_type', '=', 'car_service')->get();
        $countries  = Country::where('car_status','=','active')->get();
        $states     = State::where('car_status','=','active')->get();
        $cities     = City::where('car_status','=','active')->get();
        $ownners    = CarOwner::get();
        $drivers    = CarDriver::get();
        return view('pages.cars.add',compact('brands','cartypes', 'models', 'countries', 'states', 'cities', 'ownners', 'drivers'));
        // return view('pages.cars.add',);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // create
    public function create(Request $request)
    {
        abort_if_forbidden('car.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            /*'model_id'      => ['required', 'string', 'max:255'],
            'brand_id'      => ['required', 'string', 'max:255'],
            'width'         => ['required', 'max:255'],
            'height'        => ['required', 'max:255'],
            'trip_type'     => ['required', 'string', 'max:255'],
            'day_type'      => ['required', 'string', 'max:255'],
            'city_id'       => ['required', 'max:255'],
            'state_id'      => ['required', 'max:255'],
            'country_id'    => ['required', 'max:255'],
            'seat_no'       => ['required', 'max:255'],
            'ac'            => ['required', 'max:255'],
            'wheel_drive'   => ['required', 'string', 'max:255'],
            'abs'           => ['required', 'max:255'],
            'airbag'        => ['required', 'max:255'],
            'no_of_laggage' => ['required', 'max:255'],
            'service'       => ['required', 'string', 'max:255'],
            'license_type'  => ['required', 'string', 'max:255'],
            'driver_id'     => ['required', 'string', 'max:255'],
            'ownner_id'     => ['required', 'string', 'max:255'],
            'feature_photo' => ['required','mimes:jpg,png','max:4096'],  // max 4MB
            'gallery'       => ['required', 'max:4096'],  // max 4MB
            'gallery.*'     => ['mimes:jpg,png'],*/
        ]);


        $gallery_photo  = array();
        $feature_photo  = '';
        $upload         = false;
        if($request->hasfile('gallery'))
        {
            

            foreach($request->file('gallery') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/cars'), $name);
                $gallery_photo[] = $name;
            }
        }

        if($feature_file=$request->file('feature_photo'))
        {
           
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/cars'), $feature_photo);
        }

        $new_car = Car::create([
            // 'user_id'       => $request->user_id,
            'name'          => $request->name,
            'car_type_id'      => $request->car_type_id,
            'model_id'      => $request->model_id,
            'brand_id'      => $request->brand_id,
            'width'         => $request->width,
            'height'        => $request->height,
            'length'        => $request->length,
            'trip_type'     => $request->trip_type,
            'day_type'      => $request->day_type,
            'city_id'       => $request->city_id,
            'state_id'      => $request->state_id,
            'country_id'    => $request->country_id,
            'seat_no'       => $request->seat_no,
            'ac'            => $request->ac,
            'wheel_drive'   => $request->wheel_drive,
            'abs'           => $request->abs,
            'airbag'        => $request->airbag,
            'no_of_laggage' => $request->no_of_laggage,
            'service'       => json_encode($request->service,true),
            'license_type'  => $request->license_type,
            'driver_id'     => $request->driver_id,
            'ownner_id'     => $request->owner_id,
            'feature_photo' => $feature_photo,
            'gallery'       => json_encode($gallery_photo,true),
            'status'        => 'yes',
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew car: ".json_encode($new_car);

        LogWriter::user_activity($activity,'Addingcar');

        if (auth()->user()->can('cars.create'))
            return redirect()->route('carsIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('car.edit');
        $brands     = CarBrand::get();
        $models     = CarModel::get();
        //$countries  = Country::get();
        $countries  = Country::where('car_status','=','active')->get();
        //$states     = State::get();
        //$cities     = City::get();
        $states     = State::where('car_status','=','active')->get();
        $cities     = City::where('car_status','=','active')->get();
        $ownners    = CarOwner::get();
        $drivers    = CarDriver::get();
        $cartypes   = CarType::where('service_type', '=', 'car_service')->get();
        $car        = Car::find($id);
        return view('pages.cars.edit', compact('car','cartypes', 'brands', 'models', 'countries', 'states', 'cities', 'ownners', 'drivers'));
    }

    // update car dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('car.edit');

        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            /*'model_id'      => ['required', 'string', 'max:255'],
            'brand_id'      => ['required', 'string', 'max:255'],
            'width'         => ['required', 'max:255'],
            'height'        => ['required', 'max:255'],
            'trip_type'     => ['required', 'string', 'max:255'],
            'day_type'      => ['required', 'string', 'max:255'],
            'city_id'       => ['required', 'max:255'],
            'state_id'      => ['required', 'max:255'],
            'country_id'    => ['required', 'max:255'],
            'seat_no'       => ['required', 'max:255'],
            'ac'            => ['required', 'max:255'],
            'wheel_drive'   => ['required', 'string', 'max:255'],
            'abs'           => ['required', 'max:255'],
            'airbag'        => ['required', 'max:255'],
            'no_of_laggage' => ['required', 'max:255'],
            'service'       => ['required', 'string', 'max:255'],
            'license_type'  => ['required', 'string', 'max:255'],
            'driver_id'     => ['required', 'string', 'max:255'],
            'ownner_id'     => ['required', 'string', 'max:255'],
            'feature_photo' => ['mimes:jpg,png','max:4096'],  // max 4MB
            'gallery'       => ['max:4096'],  // max 4MB
            'gallery.*'     => ['mimes:jpg,png'],*/
        ]);
       $car = Car::find($id);

        /*multi image*/
        
        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/cars'), $feature_photo);
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
                $file->move(public_path('gallery/cars'), $name);
                $gallery_photo[] = $name;
                
            }
        
             $gallery=array_merge($oldgallery, $gallery_photo);
    
        }else{
                $gallery = $oldgallery;
            }
            

        /*end*/
        $before = $car;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates car: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $car->fill($request->all());
        $car->feature_photo=$feature_photo;
        $car->gallery=$gallery;
        $car->save();

        $afterCat = $car;
        $activity .="\nAfter updates car: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingcar');

        if (auth()->user()->can('cars.edit'))
            return redirect()->route('carsIndex');
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
        abort_if_forbidden('car.delete');
        $cars=Car::find($id);
        $cars->delete();
        return redirect()->route('carsIndex');
    }
}
