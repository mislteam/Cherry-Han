<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Blade\ApiUserController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiTourDestinationController;
use App\Http\Controllers\Api\ApiTourController;
use App\Http\Controllers\Api\ApiHotelController;
use App\Http\Controllers\Api\ApiBusTicketController;
use App\Http\Controllers\Api\ApiAirTicketController;
use App\Http\Controllers\Api\ApiCarController;
use App\Http\Controllers\Api\ApiContainerController;
use App\Http\Controllers\Api\ApiCargoController;
use App\Http\Controllers\Api\ApiTermController;
use App\Http\Controllers\Api\ApiUserRegisterController;
use App\Http\Controllers\Api\ApiPointSettingController;

use App\Http\Controllers\Api\ApiDeliveryBookingController;
use App\Http\Controllers\Api\ApiCarBookingController;
use App\Http\Controllers\Api\ApiContainerBookingController;
use App\Http\Controllers\Api\ApiHotelBookingController;
use App\Http\Controllers\Api\ApiTourBookingController;
use App\Http\Controllers\Api\ApiBusTicketBookingController;
use App\Http\Controllers\Api\ApiCargoBookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

# Api Clients
Route::post('/login',[ApiAuthController::class,'login']);

//user-register
Route::post('/userSignup',[ApiUserRegisterController::class,'store']);
Route::post('/agentSignup',[ApiUserRegisterController::class,'agentcreate']);

Route::group(['middleware' => 'api-auth'],function (){
    Route::post('/logout',[ApiAuthController::class,'logout']);
    Route::post('/getProfile',[ApiAuthController::class,'me']);
    Route::post('/tokens',[ApiAuthController::class,'getAllTokens']);
    Route::get('/getBanner',[ApiCategoryController::class,'banner']);
    Route::get('/getCategory',[ApiCategoryController::class,'index']);

    Route::get('/getCar', [ApiCarController::class, 'index']);
    Route::post('/getCarDetail', [ApiCarController::class, 'details']);
    Route::get('/getCar/show/{car_id}',[ApiCarController::class,'show']);
    Route::get('/getCargo', [ApiCargoController::class, 'index']);
    Route::get('/getCargo/show/{cargo_id}', [ApiCargoController::class, 'show']);
    Route::get('/getContainer', [ApiContainerController::class, 'index']);
    Route::get('/getContainer/show/{container_id}', [ApiContainerController::class, 'show']);
    Route::get('/getBusTicket', [ApiBusTicketController::class, 'index']);
    Route::get('/getBusTicket/show/{bus_id}',[ApiBusTicketController::class,'show']);
    Route::get('/getAirTicket', [ApiAirTicketController::class, 'index']);
    Route::get('/getHotel', [ApiHotelController::class, 'index']);
    Route::get('/getHotel/show/{hotel_id}', [ApiHotelController::class, 'show']);
    Route::get('/getTour', [ApiTourController::class, 'index']);
    Route::get('/getTour/show/{tour_id}', [ApiTourController::class, 'show']);
    //tour destination
    Route::get('/tourdestination',[ApiTourDestinationController::class,'index']);
    Route::get('/tourdestination/show/{id}',[ApiTourDestinationController::class,'show']);
    Route::get('/tourdestinationplace/{destination_id}',[ApiTourDestinationController::class,'tourdestinationplace']);
    Route::get('/tourdestination/tour/{destination_id}',[ApiTourDestinationController::class,'destination2tour']);
    /*Booking Process*/

    //car
    Route::post('/carbooking/{car_id}',[ApiCarBookingController::class,'store']);
    Route::delete('/carbooking/del/{user_id}/{order_id}',[ApiCarBookingController::class,'destroy']);
    //cargo
    Route::post('/cargobooking/{cargo_id}',[ApiCargoBookingController::class,'store']);
    Route::delete('/cargobooking/del/{user_id}/{order_id}',[ApiCargoBookingController::class,'destroy']);

    //container
    Route::post('/containerbooking/{container_id}',[ApiContainerBookingController::class,'store']);
    Route::delete('/containerbooking/del/{user_id}/{order_id}',[ApiContainerBookingController::class,'destroy']);

    //hotel
    Route::post('/hotelbooking/{hotel_id}',[ApiHotelBookingController::class,'store']);
    Route::delete('/hotelbooking/del/{user_id}/{order_id}',[ApiHotelBookingController::class,'destroy']);

    //tour
    Route::post('/tourbooking/{tour_id}',[ApiTourBookingController::class,'store']);
    Route::delete('/tourbooking/del/{user_id}/{order_id}',[ApiTourBookingController::class,'destroy']);

    //busticket
    Route::post('/busticketbooking/{busticket_id}',[ApiBusTicketBookingController::class,'store']);
    Route::delete('/busticketbooking/del/{user_id}/{order_id}',[ApiBusTicketBookingController::class,'destroy']);

    //delivery
    Route::post('/deliverydetailorder/store',[ApiDeliveryBookingController::class,'store']);
    Route::post('/deliverydetailorder/addmore',[ApiDeliveryBookingController::class,'store']);
    

    //delivery detail order
    Route::get('/deliverydetailorder/{user_id}',[ApiDeliveryBookingController::class,'deliverydetailorder']);
    Route::delete('/deliverydetailorder/del/{id}',[ApiDeliveryBookingController::class,'destroy']);

    //pointsetting
    Route::post('/pointsetting/{user_id}/{general_id}',[ApiPointSettingController::class,'store']);
    Route::post('/pointsetting/changemoney/{user_id}',[ApiPointSettingController::class,'changemoney']);


    //terms
    Route::get('/terms/{type}',[ApiTermController::class,'index']);

    //tour
    Route::get('/tour',[ApiTourController::class,'index']);
    Route::get('/tour/show/{id}',[ApiTourController::class,'show']);
    Route::get('/touritineary/{tour_id}',[ApiTourController::class,'touritineary']);

    //hotel 
     Route::get('/hotel',[ApiHotelController::class,'index']);
     Route::get('/hotel/show/{id}',[ApiHotelController::class,'show']);
     Route::get('/roomtype/{hotel_id}',[ApiHotelController::class,'roomtype']);

    //Busticket
    Route::get('/getBusTicket',[ApiBusTicketController::class,'index']);

    //car
    Route::get('/getCarList',[ApiCarController::class,'index']);
    Route::get('/getOneCar/show/{id}',[ApiCarController::class,'show']);

    //container
    Route::get('/container',[ApiContainerController::class,'index']);
    Route::get('/container/show/{id}',[ApiContainerController::class,'show']);
    Route::get('/containerprice/{container_id}',[ApiContainerController::class,'containerprice']);

    //cargo
    Route::get('/cargo',[ApiCargoController::class,'index']);
    Route::get('/cargo/show/{id}',[ApiCargoController::class,'show']);

    
});

Route::group(['middleware' => 'ajax.check'],function (){
    Route::post('/api-user/toggle-status/{user_id}',[ApiUserController::class,'toggleUserActivation']);
    Route::post('/api-token/toggle-status/{token_id}',[ApiUserController::class,'toggleTokenActivation']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
