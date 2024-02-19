<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\LogWriter;
use App\Models\TourDestination;
use App\Models\TourCategory;

class TourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('tour-category.show');
        $lists = TourCategory::orderBy('id', 'desc')->get();
        return view('pages.tourcategory.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('tourcategory.add');
        return view('pages.tourcategory.add');
    }

    public function create(Request $request)
    {
        abort_if_forbidden('tourcategory.create');

         $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
           
        ]);

        $tourcategory = TourCategory::create([
            'name'          => $request->name,           
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew tourcategory: ".json_encode($tourcategory);

        LogWriter::user_activity($activity,'Addingtourcategory');

        if (auth()->user()->can('tourcategory.create'))
            return redirect()->route('tourcategoryIndex');
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
        abort_if_forbidden('tourcategory.edit');
        $tourcategorys = TourCategory::find($id);
        return view('pages.tourcategory.edit',compact('tourcategorys'));
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
        abort_if_forbidden('tourcategory.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            
        ]);
        $tourcategory = TourCategory::find($id);
        $before = $tourcategory;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates tourcategory: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $tourcategory->fill($request->all());
        $tourcategory->save();

        $afterCat = $tourcategory;
        $activity .="\nAfter updates tourcategory: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingtourcategory');

        if (auth()->user()->can('tourcategory.edit'))
            return redirect()->route('tourcategoryIndex');
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
        abort_if_forbidden('tourcategory.delete');
        $tourcategory=TourCategory::find($id);
        $tourcategory->delete();
        return redirect()->route('tourcategoryIndex');
    }
}
