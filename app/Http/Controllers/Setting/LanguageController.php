<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('language.show');
        $languages = Language::all();

        return view('pages.language.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id,$status)
    {
        abort_if_forbidden('language.edit');
       
        //$language = Language::find($word_id);
        $language = DB::table('languages')
            ->where('word_id',$id)
            ->first();
        return view('pages.language.edit',compact('language'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$status)
    {
        
        abort_if_forbidden('language.edit');
        
        //$language = Language::find($id);
    
        $language = DB::table('languages')                
                  ->where('word_id', $id)
                  ->update([
                            'english' =>$request->english,
                            'myanmar' =>$request->myanmar ]);

        if($status=="message"){

        return redirect()->route('deliverymessage');
        }
        else{
                if (auth()->user()->can('language.edit'))
                    return redirect()->route('languageIndex');
                else
                    return redirect()->route('home');
                    }
      
        
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
