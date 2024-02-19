<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LogWriter;
use App\Models\Terms;
use App\Models\Category;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       abort_if_forbidden('term.show');
       $lists = Terms::orderBy('id', 'desc')->get();
        // dd($lists);
 
        return view('pages.term.index', compact('lists')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        abort_if_forbidden('term.add');
        $service_type=Terms::all();
        $c=count($service_type);
        $ser=array();
        for($i=0;$i<$c;$i++){
          array_push($ser,$service_type[$i]['service_type']);
        
        }
        //dd($ser);
 
        $services=Category::whereNotIn('type',$ser)->get();
        //dd($services);

        //$services=Category::all();
        return view('pages.term.add',compact('services','service_type','ser')); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('term.add');
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
           
        ]);

        $term = Terms::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Term: ".json_encode($term);

        LogWriter::user_activity($activity,'Addingterm');

        if (auth()->user()->can('term.create'))
            return redirect()->route('termIndex');
        else
            return redirect()->route('home');
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
        abort_if_forbidden('term.edit');
        $term=Terms::find($id);
        //$services=Category::all();
        $services=Category::where('type',$term->service_type)->first();
        return view('pages.term.edit',compact('services','term')); 
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
        abort_if_forbidden('Term.edit');

        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
     
        ]);
 
        $term = Terms::find($id);
        $before = $term;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Terms: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $term->fill($request->all());
        $term->save();

        $afterCat = $term;
        $activity .="\nAfter updates Terms: ".logObj($afterCat);

        LogWriter::user_activity($activity,'EditingTerms');

        if (auth()->user()->can('term.edit'))
            return redirect()->route('termIndex');
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
        $term=Terms::find($id);
        $term->delete();
        return redirect()->route('termIndex');
    }
}
