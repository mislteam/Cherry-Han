<?php

namespace App\Http\Controllers\CarType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\LogWriter;

use App\Models\CarType;
use App\Models\Category;

class CarTypeController extends Controller
{

    public function index()
    {
        abort_if_forbidden('cartype.show');
        $lists = CarType::orderBy('id', 'asc')->get();

        return view('pages.cartype.index',compact('lists'));
    }



    public function add()
    {
        abort_if_forbidden('cartype.add');
        $services = Category::where('status', 'car')->get();
        return view('pages.cartype.add', compact('services'));
    }


    // user create
    public function create(Request $request)
    {
        abort_if_forbidden('cartype.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);

        $cartype = CarType::create(array_merge($request->all(),[
            'created_by' => auth()->id(),
            ]));

        $activity = "\nCreated by: ".json_encode(auth()->user())
            ."\nNew Car Type: ".json_encode($cartype);

        LogWriter::user_activity($activity,'AddingCarType');

        if (auth()->user()->can('cartype.create'))
            return redirect()->route('cartypeIndex');
        else
            return redirect()->route('home');
    }

    // user edit page
    public function edit($id)
    {
        abort_if_forbidden('cartype.edit');
        $cartype = CarType::find($id);
        $services = Category::where('status', 'car')->get();
        return view('pages.cartype.edit',compact(['services', 'cartype']));
    }

    // update subcategory dates
    public function update(Request $request, $id)
    {
        abort_if_forbidden('cartype.edit');

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string', 'max:255'],
        ]);
        $cartype = CarType::find($id);
        $before = $cartype;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates Car Type: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $cartype->fill($request->all());
        $cartype->save();

        $afterCat = $cartype;
        $activity .="\nAfter updates Car Type: ".logObj($afterCat);

        LogWriter::user_activity($activity,'EditingCarType');

        if (auth()->user()->can('cartype.edit'))
            return redirect()->route('cartypeIndex');
        else
            return redirect()->route('home');
    }

    // Delete Cartype
    public function destroy($id)
    {
        //
    }
}
