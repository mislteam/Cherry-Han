<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Services\LogWriter;

use App\Models\Banner;
use App\Models\Category;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('banner.show');       
        // $countries = Country::where('status','=','active')->get();
        $lists = Banner::orderBy('id', 'asc')->get();

        return view('pages.banner.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('banner.add');  
        $services=Category::all();   
        return view('pages.banner.add',compact('services'));
    }

    public function create(Request $request)
    {
        //abort_if_forbidden('bus_ticket.create');
        $this->validate($request,[
            'page_name'          => ['required', 'string', 'max:255'],
            
        ]);

        $banner_photo = '';
        if($feature_file=$request->file('banner_photo'))
        {           

            $banner_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/banner'), $banner_photo);
        }

        $banner = Banner::create([
            'page_name'          => $request->page_name,
            'service_type'      => $request->service_type,
            'banner_type'      => $request->banner_type,           
            'banner_photo'    => $banner_photo,
            'status'        => 'yes',
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew banner: ".json_encode($banner);

        LogWriter::user_activity($activity,'Addingbanner');

        if (auth()->user()->can('banner.create'))
            return redirect()->route('bannerIndex');
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
        abort_if_forbidden('banner.edit'); 
        $services=Category::all();    
        $banner=Banner::find($id);
        return view('pages.banner.edit',compact('banner','services'));
        
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
        abort_if_forbidden('banner.edit');

        $this->validate($request,[
            'page_name' => ['required', 'string', 'max:255'],
        ]);
        
        $banner = Banner::find($id);

        if($feature_file=$request->file('banner_photo'))
        {           

            $banner_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/banner'), $banner_photo);
        }else{
            $banner_photo=request('old_banner_photo');
        }
        
        $before = $banner;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .= "\nBefore updates banner: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $banner->fill($request->all());
        $banner->banner_photo = $banner_photo;
        $banner->save();

        $afterCat = $banner;
        $activity .="\nAfter updates banner: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingbanner');

        if (auth()->user()->can('banner.edit'))
            return redirect()->route('bannerIndex');
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
        abort_if_forbidden('banner.delete');
        $banner=Banner::find($id);
        $banner->delete();
        return redirect()->route('bannerIndex');
    }
}