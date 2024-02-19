<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Services\LogWriter;

class CompanySettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('companysetting.show');
        $lists = CompanySetting::orderBy('id', 'desc')->get();
        return view('pages.company_setting.index',compact('lists'));
    }


    public function add()
    {
        abort_if_forbidden('companysetting.add');       
        return view('pages.company_setting.add');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if_forbidden('companysetting.create');
        $this->validate($request,[
            'name'          => ['required', 'string', 'max:255'],
            
        ]);

        $logo = '';
        if($feature_file=$request->file('logo'))
        {           

            $logo = time().rand(1,100).'.'.$feature_file->extension();
            $feature_file->move(public_path('feature/company'), $logo);
        }

        $companysetting = CompanySetting::create([
            'name'     => $request->name,                 
            'logo'          => $logo,
            'created_by'    => auth()->id(),
        ]);

        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew company setting: ".json_encode($companysetting);

        LogWriter::user_activity($activity,'Addingcompanysetting');

        if (auth()->user()->can('companysetting.create'))
            return redirect()->route('companysettingIndex');
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
        abort_if_forbidden('companysetting.edit');
        $companysetting=CompanySetting::find($id);       
        return view('pages.company_setting.edit',compact('companysetting'));
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
        abort_if_forbidden('companysetting.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
           
        ]);
               

        if($logo=$request->file('logo'))
        {
            $company_logo=time().rand(1,100).'.'.$logo->extension();
            $logo->move(public_path('feature/company'),$company_logo);
        }else{
            $company_logo=$request->old_logo;
        }

        $companysetting = CompanySetting::find($id);
        $before = $companysetting;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates companysetting: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $companysetting->fill($request->all());
        $companysetting->logo=$company_logo;
        $companysetting->save();

        $after = $companysetting;
        $activity .="\nAfter updates CompanySetting: ".logObj($after);

        LogWriter::user_activity($activity,'EditingCompanySetting');

        if (auth()->user()->can('companysetting.edit'))
            return redirect()->route('companysettingIndex');
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
        $companysetting=CompanySetting::find($id);
        $companysetting->delete();
        return redirect()->route('companysettingIndex');
    }
}
