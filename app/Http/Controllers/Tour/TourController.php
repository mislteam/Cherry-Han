<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\TourDestination;
use App\Models\TourItineary;
use Illuminate\Http\Request;
use App\Services\LogWriter;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('tour.show');
        $lists = Tour::orderBy('id', 'desc')->get();
        return view('pages.tour.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function add()
    {
        abort_if_forbidden('tour.add');
        $tourcategorys = TourCategory::all();
        $tourdestinations = TourDestination::all();
        return view('pages.tour.add',compact('tourcategorys','tourdestinations'));
    }

     public function view($id)
    {
        abort_if_forbidden('tour.view');
        $itineary=TourItineary::where('tour_id',$id)->get();
        $tour = Tour::find($id);
        return view('pages.tour.view', compact('tour','itineary'));
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
        abort_if_forbidden('tour.add');
        $this->validate($request,[
            'tour_name' => ['required', 'string', 'max:255'],
           
        ]);

        $gallery_photo = array();
        $feature_photo = '';
        $upload = false;

        if($request->hasfile('gallery'))
        {           
            foreach($request->file('gallery') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gallery/tour'), $name);
                $gallery_photo[] = $name;
            }
        }
        
        if($feature_file=$request->file('feature_photo'))
        {
            
            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/tour'), $feature_photo);
        }
        

        $tour = Tour::create([
            'tour_name'          => $request->tour_name,
            'category_id'      => $request->tourcategory_id,
            'destination_id'      =>json_encode($request->tourdestination_id,true),
            'price'         => $request->price,
            'package'         => $request->package,
            'passenger'         => $request->passenger,
            'description'     => $request->description,
            'include'         => $request->include,
            'exclude'         => $request->exclude,
            'contact_person'         => $request->contact_person,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'website'         => $request->website,
            'feature_photo' => $feature_photo,
            'gallery'       => json_encode($gallery_photo,true),
            'status'        => 'yes',
            'created_by'    => auth()->id(),
        ]);
         $tour_id=$tour->id;

        $itinary_title=$request->itinary_title;
        $itinary_description=$request->itinary_description;
        $count=count($itinary_title);
        
        for($i=0;$i<$count;$i++){
    
            $iti=array(
                'title'         => $itinary_title[$i],                   
                'description'   => $itinary_description[$i],
                'tour_id'       => $tour_id,            
                'created_by'    => auth()->id(),
            );
           
           $touritineary = TourItineary::create($iti);
        }
   
       //dd($touritineary);exit;

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew tour: ".json_encode($tour);

        LogWriter::user_activity($activity,'Addingtour');

        if (auth()->user()->can('tour.create'))
            return redirect()->route('tourIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('tour.edit');
        $tourcategorys = TourCategory::all();
        $tourdestinations = TourDestination::all();
        $itineary = TourItineary::where('tour_id',$id)->get();
        $tour = Tour::find($id);
        return view('pages.tour.edit',compact('tour','tourcategorys','itineary','tourdestinations'));
    }

    // update tour dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('tour.edit');

        $this->validate($request,[
            'tour_name' => ['required', 'string', 'max:255'],
        ]);
        $tour = Tour::find($id);

        if($feature_file=$request->file('feature_photo'))
        {           

            $feature_photo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/tour'), $feature_photo);
        }else{
            $feature_photo=request('old_feature_photo');
        }
        //dd($feature_photo);exit;

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
                $file->move(public_path('gallery/tour'), $name);
                $gallery_photo[] = $name;
                
            }
    
             $gallery=array_merge($oldgallery, $gallery_photo);
        }else{
                $gallery = $oldgallery;
            }

        $before = $tour;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates tour: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $tour->fill($request->all());
        $tour->feature_photo=$feature_photo;
        $tour->gallery=$gallery;
        $tour->category_id=$request->tourcategory_id;
        $tour->destination_id=json_encode($request->tourdestination_id,true);
        $tour->save();
        $status=false;
        $count=TourItineary::where('tour_id', $id)->count();
        if($count>0){
            $delete=TourItineary::where('tour_id', $id)->delete();
            $status=true;
        }else{
            $status=true;
        
        }
        if($status){
            $itinary_title       = $request->itinary_title;
            $itinary_description = $request->itinary_description;
            $count = count($itinary_title);
            
            for($i=0;$i<$count;$i++){
        
                $iti=array(
                    'title'         => $itinary_title[$i],                   
                    'description'   => $itinary_description[$i],
                    'tour_id'       => $id,            
                    'created_by'    => auth()->id(),
                );
               
               $touritineary = TourItineary::create($iti);
            }
  
        }
       
        $afterCat = $tour;
        $activity .="\nAfter updates tour: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingtour');

        if (auth()->user()->can('tour.edit'))
            return redirect()->route('tourIndex');
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
        $tour=Tour::find($id);
        $tour->delete();
        return redirect()->route('tourIndex');
    }
}
