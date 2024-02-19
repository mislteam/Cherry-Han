<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Services\LogWriter;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('category.show');


        // $countries = Country::where('status','=','active')->get();
        $lists = Category::orderBy('id', 'asc')->get();

        return view('pages.category.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {
        abort_if_forbidden('category.add');
        return view('pages.category.add');
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
        abort_if_forbidden('category.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'type' => ['string', 'max:255'],
        ]);

        $user = Category::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Category: ".json_encode($user);

        LogWriter::user_activity($activity,'AddingCategory');

        if (auth()->user()->can('category.create'))
            return redirect()->route('categoryIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('category.edit');
        $category = Category::find($id);
        return view('pages.category.edit',compact('category'));
    }

    // update category dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('category.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'type' => ['string', 'max:255'],
        ]);
        $category = Category::find($id);
        $before = $category;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Category: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $category->fill($request->all());
        $category->save();

        $afterCat = $category;
        $activity .="\nAfter updates Category: ".logObj($afterCat);

        LogWriter::user_activity($activity,'EditingCategory');

        if (auth()->user()->can('category.edit'))
            return redirect()->route('categoryIndex');
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
