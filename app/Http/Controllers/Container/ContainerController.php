<?php

namespace App\Http\Controllers\Container;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\LogWriter;
use App\Models\Container;
use App\Models\CarModel;
use App\Models\CarBrand;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CarOwner;
use App\Models\CarDriver;
use App\Models\CarType;
use App\Models\ContainerDestination;
use App\Models\ContainerPrice;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('container.show');


        // $countries = Country::where('status','=','active')->get();
        $lists = Container::orderBy('id', 'desc')->get();

        return view('pages.container.index',compact('lists'));
    }

    public function view($id)
    {
        abort_if_forbidden('container.show');
        $container = Container::find($id);
        return view('pages.container.view', compact('container'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('container.add');
        $brands     = CarBrand::get();
        $models     = CarModel::get();
        $countries  = Country::where('container_status','=','active')->get();
        $states     = State::where('container_status','=','active')->get();
        $cities     = City::where('container_status','=','active')->get();
        $ownners    = CarOwner::get();
        $drivers    = CarDriver::get();
        $containerdestinations    = ContainerDestination::all();
        $car_type   = CarType::where('service_type', 'container_service')->get();
        return view('pages.container.add', compact('brands', 'models', 'countries', 'states', 'cities', 'ownners', 'drivers', 'car_type','containerdestinations'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Container create
    public function create(Request $request)
    {
        abort_if_forbidden('container.add');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'], 
            'license_type'  => ['required', 'string', 'max:255'],
            'wheel_drive'   => ['required', 'string', 'max:255'],
        ]);


        $gallery_photo = array();
        $feature_photo = '';
        $upload = false;
        if($request->hasfile('gallery'))
        {
            foreach($request->file('gallery') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/container'), $name);
                $gallery_photo[] = $name;
            }
        }

        if($feature_file=$request->file('feature_photo'))
        {
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/container'), $feature_photo);
        }

        $new_container = Container::create([
            'name'          => $request->name,
            'model_id'      => $request->model_id,
            'brand_id'      => $request->brand_id,
            'width'         => $request->width,
            'height'        => $request->height,
            'length'        => $request->length,                        
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
        $container_id=$new_container->id;      
        $count=count($request->car_type_id);
        
        for($i=0;$i<$count;$i++){
    
            $price=array(
                'car_type_id'     => $request->car_type_id[$i],           
                'container_des_from_id'   => $request->container_des_from_id[$i],
                'container_des_to_id'   => $request->container_des_to_id[$i],
                'price'         => $request->price[$i],
                'container_id'      => $container_id,
                'created_by'    => auth()->id(),
            );
           
           $containerprice = ContainerPrice::create($price);
        }



        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Container: ".json_encode($new_container);

        LogWriter::user_activity($activity,'AddingContainer');

        if (auth()->user()->can('container.create'))
            return redirect()->route('containerIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('container.edit');
        $container  = Container::find($id);
        $brands     = CarBrand::get();
        $models     = CarModel::get();
        $countries  = Country::where('container_status','=','active')->get();
        $states     = State::where('container_status','=','active')->get();
        $cities     = City::where('container_status','=','active')->get();
        $ownners    = CarOwner::get();
        $drivers    = CarDriver::get();
        $containerdestinations    = ContainerDestination::all();
        $containerprices  = ContainerPrice::where('container_id',$id)->get();
        $car_type   = CarType::where('service_type', 'container_service')->get();
        return view('pages.container.edit', compact('container','brands', 'models', 'countries', 'states', 'cities', 'ownners', 'drivers', 'car_type','containerprices','containerdestinations'));
    }

    // update container dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('container.edit');

        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            
        ]);

        $container = Container::find($id);
         if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/container'), $feature_photo);
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
                $file->move(public_path('gallery/container'), $name);
                $gallery_photo[] = $name;
                
            }

             $gallery=array_merge($oldgallery, $gallery_photo);
           
        }else{
                $gallery = $oldgallery;
            }
 
        $before = $container;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates car: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $container->fill($request->all());
        $container->feature_photo=$feature_photo;
        $container->gallery=$gallery;
        $container->save();

        $status=false;
        $count=ContainerPrice::where('container_id', $id)->count();
        if($count>0){
            $delete=ContainerPrice::where('container_id', $id)->delete();
            $status=true;
        }else{
            $status=true;
        
        }
        /*if($status){*/
        if($count>0){

            $count = count($request->car_type_id);
            
            for($i=0;$i<$count;$i++){
        
                $price=array(
                    'car_type_id'         => $request->car_type_id[$i],                   
                    'container_des_from_id'   => $request->container_des_from_id[$i],
                    'container_des_to_id'   => $request->container_des_to_id[$i],
                    'price'   => $request->price[$i],
                    'container_id'       => $id,            
                    'created_by'    => auth()->id(),
                );
               
               $containerprices = ContainerPrice::create($price);
            }
  
        }

        $afterCat = $container;
        $activity .="\nAfter updates container: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingcontainer');

        if (auth()->user()->can('container.edit'))
            return redirect()->route('containerIndex');
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
        abort_if_forbidden('container.delete');
        $container=Container::find($id)->delete();
        // $container->destory();
        return redirect()->route('containerIndex');
    }
}
