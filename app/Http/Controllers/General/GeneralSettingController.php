<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Services\LogWriter;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('general-setting.show');
        $lists = GeneralSetting::orderBy('id', 'desc')->get();
        return view('pages.general_setting.index', compact('lists'));
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
    public function edit($id)
    {
        abort_if_forbidden('general-setting.edit');
        
        $row = GeneralSetting::find($id);
         if($row->unit=='logo'){
            return view('pages.general_setting.logoedit',compact('row'));
        }else{
            return view('pages.general_setting.edit',compact('row'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$unit)
    {

        abort_if_forbidden('general-setting.edit');

        /*$this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
     
        ]);*/
        $generalsetting = GeneralSetting::find($id);

        if($unit=="logo"){
            if($logo=$request->file('logo'))
            {
                $company_logo=time().rand(1,100).'.'.$logo->extension();
                $logo->move(public_path('feature/company'),$company_logo);
            }else{
                $company_logo=$request->old_logo;
            }

            $generalsetting->name=$request->name;
            $generalsetting->value=$company_logo;
            $generalsetting->save();

        }
        else{
            $generalsetting->fill($request->all());
            $generalsetting->save();
        }
              
        return redirect()->route('generalsettingIndex')->with('success','Data Update successfully');
    
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
