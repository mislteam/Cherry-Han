<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryBooking;

class HomeController extends Controller
{
    public function index11()
    {
        $is_role_exists = DB::select("SELECT COUNT(*) as cnt FROM `model_has_roles` WHERE model_id = ".auth()->id());

        if ($is_role_exists[0]->cnt)
            return view('pages.dashboard');
        else
            return view('welcome');
	}
	
	public function index()
    {
        $is_role_exists = DB::select("SELECT COUNT(*) as cnt FROM `model_has_roles` WHERE model_id = ".auth()->id());

       /* $day=date("d");
        $month=date("m");
        $year=date('Y');

        $deliverydaycount=DeliveryBooking::whereDay('created_at',$day)
                ->whereMonth('created_at',$month)
                ->whereYear('created_at',$year)
                ->count();

        $deliverymonthcount=DeliveryBooking::whereMonth('created_at',$month)
                ->whereYear('created_at',$year)
                ->count();

        $deliveryyearcount=DeliveryBooking::whereYear('created_at',$year)
                ->count();*/
                
        $deliveryday=orderdaybooking('delivery_bookings');
        $carday=orderdaybooking('car_bookings');
        $hotelday=orderdaybooking('hotel_bookings');

        $daycount=$deliveryday+$carday+$hotelday;
       
        $deliverymonth=ordermonthbooking('delivery_bookings');
        $carmonth=ordermonthbooking('car_bookings');
        $hotelmonth=ordermonthbooking('hotel_bookings');
        
        $monthcount=$deliverymonth+$carmonth+$hotelmonth;
        
        
        $deliveryyear=orderyearbooking('delivery_bookings');
        $caryear=orderyearbooking('car_bookings');
        $hotelyear=orderyearbooking('hotel_bookings');
        
        $yearcount=$deliveryyear+$caryear+$hotelyear;
       

        if ($is_role_exists[0]->cnt)
            return view('pages.dashboard',compact('daycount','monthcount','yearcount'));
        else
            return view('welcome');
	}

    public function allorder()
    {
        $is_role_exists = DB::select("SELECT COUNT(*) as cnt FROM `model_has_roles` WHERE model_id = ".auth()->id());

        if ($is_role_exists[0]->cnt)
            return view('pages.dashboard');
        else
            return view('welcome');
    }

}
