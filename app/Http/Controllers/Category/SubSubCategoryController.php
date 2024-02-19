<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use App\Services\LogWriter;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('child-category.show');

        
        // $countries = Country::where('status','=','active')->get();
        $lists = SubSubCategory::orderBy('id', 'asc')->get();

        return view('pages.childcategory.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function add()
    {
        abort_if_forbidden('child-category.add');
        $categories = Category::orderBy('id', 'asc')->get();
        $subcats = SubCategory::orderBy('id', 'asc')->get();
        return view('pages.childcategory.add', compact(['categories', 'subcats']));
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
        abort_if_forbidden('child-category.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);

        $user = SubSubCategory::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew subcategory: ".json_encode($user);

        LogWriter::user_activity($activity,'Addingsubcategory');

        if (auth()->user()->can('child-category.create'))
            return redirect()->route('subsubcategoryIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('child-category.edit');
        $subcategory    = SubSubCategory::find($id);
        $categories     = Category::orderBy('id', 'asc')->get();
        $subcats        = SubCategory::orderBy('id', 'asc')->get();
        return view('pages.childcategory.edit', compact(['categories', 'subcats', 'subcategory']));
    }

    // update subcategory dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('child-category.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);
        $subcategory = SubSubCategory::find($id);
        $before = $subcategory;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates subcategory: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $subcategory->fill($request->all());
        $subcategory->save();
        
        $afterCat = $subcategory;
        $activity .="\nAfter updates subcategory: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editing subcategory');

        if (auth()->user()->can('child-category.edit'))
            return redirect()->route('subsubcategoryIndex');
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
