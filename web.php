<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blade\UserController;
use App\Http\Controllers\Blade\RoleController;
use App\Http\Controllers\Blade\PermissionController;
use App\Http\Controllers\Blade\HomeController;
use App\Http\Controllers\Blade\ApiUserController;

use App\Http\Controllers\Setting\CountryController;
use App\Http\Controllers\Setting\StateController;
use App\Http\Controllers\Setting\CityController;

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\SubCategoryController;
use App\Http\Controllers\Category\SubSubCategoryController;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\TermController;

use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\CarOwnerController;
use App\Http\Controllers\Car\CarDriverController;
use App\Http\Controllers\Car\CarBookingController;
use App\Http\Controllers\Brand\CarModelController;
use App\Http\Controllers\Brand\BrandController;

use App\Http\Controllers\Container\ContainerController;
use App\Http\Controllers\Container\ContainerBookingController;

use App\Http\Controllers\Cargo\CargoController;
use App\Http\Controllers\Cargo\CargoBookingController;

use App\Http\Controllers\Bus\BusGateController;
use App\Http\Controllers\Bus\BusTicketController;
use App\Http\Controllers\Bus\BusTicketBookingController;

use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\Tour\TourItinearyController;
use App\Http\Controllers\Tour\TourBookingController;
use App\Http\Controllers\Tour\TourCategoryController;
use App\Http\Controllers\Tour\TourDestinationController;

use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\HotelBookingController;
use App\Http\Controllers\Hotel\RoomTypeController;
use App\Http\Controllers\Hotel\RoomTypeCategoryController;

use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\DeliveryChargesController;
use App\Http\Controllers\Delivery\DeliveryBookingController;
use App\Http\Controllers\Delivery\DeliveryDetailOrderController;

use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Blade (front-end) Routes
|--------------------------------------------------------------------------
|
| Here is we write all routes which are related to web pages
| like UserManagement interfaces, Diagrams and others
|
*/

// Default laravel auth routes
Auth::routes();


// Welcome page
Route::get('/frontend', [FrontendController::class, 'index'])->name('frontend');
Route::get('/frontend/cars', [FrontendController::class, 'carindex'])->name('cars');
Route::get('/frontend/tours', [FrontendController::class, 'tourindex'])->name('tours');
Route::get('/frontend/hotel', [FrontendController::class, 'hotelindex'])->name('hotel');
Route::get('/frontend/busticket', [FrontendController::class, 'busticketindex'])->name('busticket');
Route::get('/frontend/cardetail/{id}',[FrontendController::class,'carview'])->name('frontendcarsView');
Route::get('/frontend/tourdetail/{id}',[FrontendController::class,'tourview'])->name('frontendtourView');
Route::get('/frontend/hoteldetail/{id}',[FrontendController::class,'hotelview'])->name('frontendhotelView');

Route::get('/getweight/{city_id}',[FrontendController::class,'getweight'])->name('getweight');

Route::get('/', function (){
    return redirect()->route('home');
})->name('welcome');
// Web pages
Route::group(['middleware' => 'auth'],function (){

    // there should be graphics, diagrams about total conditions
    Route::get('/home', [HomeController::class,'index'])->name('home');

    // Users
    Route::get('/user',[UserController::class,'index'])->name('userIndex');
    Route::get('/user/add',[UserController::class,'add'])->name('userAdd');
    Route::post('/user/create',[UserController::class,'create'])->name('userCreate');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('userEdit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('userDestroy');
    Route::get('/user/theme-set/{id}',[UserController::class,'setTheme'])->name('userSetTheme');

    //change password
    Route::get('/change_password',[UserController::class,'changepassword'])->name('changepasswordEdit');

    Route::post('/change_password/{id}', [UserController::class,'changepasswordupdate'])->name('changepasswordUpdate');
    
    /* 
    // Customers   
    Route::get('/customer',[ApiUserController::class,'index'])->name('api-userIndex');
    Route::get('/customer/add',[ApiUserController::class,'add'])->name('api-userAdd');
    Route::post('/customer/create',[ApiUserController::class,'create'])->name('api-userCreate');
    Route::get('/customer/show/{id}',[ApiUserController::class,'show'])->name('api-userShow');
    Route::get('/customer/{id}/edit',[ApiUserController::class,'edit'])->name('api-userEdit');
    Route::post('/customer/update/{id}',[ApiUserController::class,'update'])->name('api-userUpdate');
    Route::delete('/customer/delete/{id}',[ApiUserController::class,'destroy'])->name('api-userDestroy');
    Route::delete('/customer-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');

    //Agents
    Route::get('/customer',[ApiUserController::class,'index'])->name('api-userIndex');
    Route::get('/customer/add',[ApiUserController::class,'add'])->name('api-userAdd');
    Route::post('/customer/create',[ApiUserController::class,'create'])->name('api-userCreate');
    Route::get('/customer/show/{id}',[ApiUserController::class,'show'])->name('api-userShow');
    Route::get('/customer/{id}/edit',[ApiUserController::class,'edit'])->name('api-userEdit');
    Route::post('/customer/update/{id}',[ApiUserController::class,'update'])->name('api-userUpdate');
    Route::delete('/customer/delete/{id}',[ApiUserController::class,'destroy'])->name('api-userDestroy');
    Route::delete('/customer-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');

    */

    Route::get('/api-user',[ApiUserController::class,'index'])->name('api-userIndex');
    Route::get('/api-user/add',[ApiUserController::class,'add'])->name('api-userAdd');
    Route::post('/api-user/create',[ApiUserController::class,'create'])->name('api-userCreate');
    Route::get('/api-user/show/{id}',[ApiUserController::class,'show'])->name('api-userShow');
    Route::get('/api-user/edit/{id}',[ApiUserController::class,'edit'])->name('api-userEdit');
    Route::post('/api-user/update/{id}',[ApiUserController::class,'update'])->name('api-userUpdate');
    Route::delete('/api-user/delete/{id}',[ApiUserController::class,'destroy'])->name('api-userDestroy');
    Route::delete('/api-user-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');

    // Permissions
    Route::get('/permission',[PermissionController::class,'index'])->name('permissionIndex');
    Route::get('/permission/add',[PermissionController::class,'add'])->name('permissionAdd');
    Route::post('/permission/create',[PermissionController::class,'create'])->name('permissionCreate');
    Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permissionEdit');
    Route::post('/permission/update/{id}',[PermissionController::class,'update'])->name('permissionUpdate');
    Route::delete('/permission/delete/{id}',[PermissionController::class,'destroy'])->name('permissionDestroy');

    // Roles
    Route::get('/role',[RoleController::class,'index'])->name('roleIndex');
    Route::get('/role/add',[RoleController::class,'add'])->name('roleAdd');
    Route::post('/role/create',[RoleController::class,'create'])->name('roleCreate');
    Route::get('/role/edit/{role_id}',[RoleController::class,'edit'])->name('roleEdit');
    Route::post('/role/update/{role_id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('roleDestroy');

    // Country
    Route::get('/country',[CountryController::class,'index'])->name('countryIndex');
    Route::get('/country/add',[CountryController::class,'add'])->name('countryAdd');
    Route::post('/country/create',[CountryController::class,'create'])->name('countryCreate');
    Route::get('/country/edit/{country_id}',[CountryController::class,'edit'])->name('countryEdit');
    Route::post('/country/update/{country_id}',[CountryController::class,'update'])->name('countryUpdate');
    Route::delete('/country/delete/{id}',[CountryController::class,'destroy'])->name('countryDestroy');

    // State
    Route::get('/state',[StateController::class,'index'])->name('stateIndex');
    Route::get('/state/add',[StateController::class,'add'])->name('stateAdd');
    Route::post('/state/create',[StateController::class,'create'])->name('stateCreate');
    Route::get('/state/edit/{state_id}',[StateController::class,'edit'])->name('stateEdit');
    Route::post('/state/update/{state_id}',[StateController::class,'update'])->name('stateUpdate');
    Route::delete('/state/delete/{id}',[StateController::class,'destroy'])->name('stateDestroy');

    // City
    Route::get('/city',[CityController::class,'index'])->name('cityIndex');
    Route::get('/city/add',[CityController::class,'add'])->name('cityAdd');
    Route::post('/city/create',[CityController::class,'create'])->name('cityCreate');
    Route::get('/city/edit/{id}',[CityController::class,'edit'])->name('cityEdit');
    Route::post('/city/update/{id}',[CityController::class,'update'])->name('cityUpdate');
    

    // Category
    Route::get('/category',[CategoryController::class,'index'])->name('categoryIndex');
    Route::get('/category/add',[CategoryController::class,'add'])->name('categoryAdd');
    Route::post('/category/create',[CategoryController::class,'create'])->name('categoryCreate');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('categoryEdit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('categoryUpdate');
    Route::delete('/category/delete/{id}',[CategoryController::class,'destroy'])->name('categoryDestroy');

    // SubCategory
    Route::get('/sub-category',[SubCategoryController::class,'index'])->name('sub_categoryIndex');
    Route::get('/sub-category/add',[SubCategoryController::class,'add'])->name('sub_categoryAdd');
    Route::post('/sub-category/create',[SubCategoryController::class,'create'])->name('sub_categoryCreate');
    Route::get('/sub-category/{id}/edit',[SubCategoryController::class,'edit'])->name('sub_categoryEdit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub_categoryUpdate');
    Route::delete('/sub-category/delete/{id}',[SubCategoryController::class,'destroy'])->name('sub_categoryDestroy');

    // SubSubCategory
    Route::get('/child-category',[SubSubCategoryController::class,'index'])->name('sub_sub_categoryIndex');
    Route::get('/child-category/add',[SubSubCategoryController::class,'add'])->name('sub_sub_categoryAdd');
    Route::post('/child-category/create',[SubSubCategoryController::class,'create'])->name('sub_sub_categoryCreate');
    Route::get('/child-category/{id}/edit',[SubSubCategoryController::class,'edit'])->name('sub_sub_categoryEdit');
    Route::post('/child-category/update/{id}',[SubSubCategoryController::class,'update'])->name('sub_sub_categoryUpdate');
    Route::delete('/child-category/delete/{id}',[SubSubCategoryController::class,'destroy'])->name('sub_sub_categoryDestroy');


    // Car List
    Route::get('/cars',[CarController::class,'index'])->name('carsIndex');
    Route::get('/cars/detail/{id}',[CarController::class,'view'])->name('carsView');
    Route::get('/cars/add',[CarController::class,'add'])->name('carsAdd');
    Route::post('/cars/create',[CarController::class,'create'])->name('carsCreate');
    Route::get('/cars/edit/{id}',[CarController::class,'edit'])->name('carsEdit');
    Route::post('/cars/update/{id}',[CarController::class,'update'])->name('carsUpdate');
    Route::delete('/cars/delete/{id}',[CarController::class,'destroy'])->name('carsDestroy');

    // Car Booking
    Route::get('/car-booking',[CarBookingController::class,'index'])->name('carsBookingIndex');
    Route::get('/car-booking/add',[CarBookingController::class,'add'])->name('carsBookingAdd');
    Route::post('/car-booking/create',[CarBookingController::class,'create'])->name('carsBookingCreate');
    Route::get('/car-booking/edit/{id}',[CarBookingController::class,'edit'])->name('carsBookingEdit');
    Route::post('/car-booking/update/{id}',[CarBookingController::class,'update'])->name('carsBookingUpdate');
    Route::delete('/car-booking/delete/{id}',[CarBookingController::class,'destroy'])->name('carsBookingDestroy');

    // Car Model Booking
    Route::get('/car-model',[CarModelController::class,'index'])->name('carmodelIndex');
    Route::get('/car-model/add',[CarModelController::class,'add'])->name('carmodelAdd');
    Route::post('/car-model/create',[CarModelController::class,'create'])->name('carmodelCreate');
    Route::get('/car-model/edit/{id}',[CarModelController::class,'edit'])->name('carmodelEdit');
    Route::post('/car-model/update/{id}',[CarModelController::class,'update'])->name('carmodelUpdate');
    Route::delete('/car-model/delete/{id}',[CarModelController::class,'destroy'])->name('carmodelDestroy');

    // Car Brand Booking
    Route::get('/car-brand',[BrandController::class,'index'])->name('carbrandIndex');
    Route::get('/car-brand/add',[BrandController::class,'add'])->name('carbrandAdd');
    Route::post('/car-brand/create',[BrandController::class,'create'])->name('carbrandCreate');
    Route::get('/car-brand/edit/{id}',[BrandController::class,'edit'])->name('carbrandEdit');
    Route::post('/car-brand/update/{id}',[BrandController::class,'update'])->name('carbrandUpdate');
    Route::delete('/car-brand/delete/{id}',[BrandController::class,'destroy'])->name('carbrandDestroy');
    Route::get('/getbrandmodel',[BrandController::class,'getbrandmodel'])->name('getbrandmodel');



    // Container List
    Route::get('/container',[ContainerController::class,'index'])->name('containerIndex');
    Route::get('/container/add',[ContainerController::class,'add'])->name('containerAdd');
    Route::post('/container/create',[ContainerController::class,'create'])->name('containerCreate');
    Route::get('/container/edit/{id}',[ContainerController::class,'edit'])->name('containerEdit');
    Route::post('/container/update/{id}',[ContainerController::class,'update'])->name('containerUpdate');
    Route::delete('/container/delete/{id}',[ContainerController::class,'destroy'])->name('containerDestroy');

    // Container Booking
    Route::get('/container-booking',[ContainerBookingController::class,'index'])->name('containerBookingIndex');
    Route::get('/container-booking/add',[ContainerBookingController::class,'add'])->name('containerBookingAdd');
    Route::post('/container-booking/create',[ContainerBookingController::class,'create'])->name('containerBookingCreate');
    Route::get('/container-booking/edit/{id}',[ContainerBookingController::class,'edit'])->name('containerBookingEdit');
    Route::post('/container-booking/update/{id}',[ContainerBookingController::class,'update'])->name('containerBookingUpdate');
    Route::delete('/container-booking/delete/{id}',[ContainerBookingController::class,'destroy'])->name('containerBookingDestroy');

    // Cargo List
    Route::get('/cargo',[CargoController::class,'index'])->name('cargoIndex');
    Route::get('/cargo/add',[CargoController::class,'add'])->name('cargoAdd');
    Route::post('/cargo/create',[CargoController::class,'create'])->name('cargoCreate');
    Route::get('/cargo/edit/{id}',[CargoController::class,'edit'])->name('cargoEdit');
    Route::post('/cargo/update/{id}',[CargoController::class,'update'])->name('cargoUpdate');
    Route::delete('/cargo/delete/{id}',[CargoController::class,'destroy'])->name('cargoDestroy');

    // Cargo Booking
    Route::get('/cargo-booking',[CargoBookingController::class,'index'])->name('cargoBookingIndex');
    Route::get('/cargo-booking/add',[CargoBookingController::class,'add'])->name('cargoBookingAdd');
    Route::post('/cargo-booking/create',[CargoBookingController::class,'create'])->name('cargoBookingCreate');
    Route::get('/cargo-booking/edit/{id}',[CargoBookingController::class,'edit'])->name('cargoBookingEdit');
    Route::post('/cargo-booking/update/{id}',[CargoBookingController::class,'update'])->name('cargoBookingUpdate');
    Route::delete('/cargo-booking/delete/{id}',[CargoBookingController::class,'destroy'])->name('cargoBookingDestroy');

    // Bus Ticket List
    Route::get('/bus-ticket',[BusTicketController::class,'index'])->name('busTicketIndex');
    Route::get('/bus-ticket/add',[BusTicketController::class,'add'])->name('busTicketAdd');
    Route::post('/bus-ticket/create',[BusTicketController::class,'create'])->name('busTicketCreate');
    Route::get('/bus-ticket/edit/{id}',[BusTicketController::class,'edit'])->name('busTicketEdit');
    Route::post('/bus-ticket/update/{id}',[BusTicketController::class,'update'])->name('busTicketUpdate');
    Route::delete('/bus-ticket/delete/{id}',[BusTicketController::class,'destroy'])->name('busTicketDestroy');
     Route::get('/getstatecity',[BusTicketController::class,'getstatecity'])->name('getstatecity');

    // Banner List
    Route::get('/banner',[BannerController::class,'index'])->name('bannerIndex');
    Route::get('/banner/add',[BannerController::class,'add'])->name('bannerAdd');
    Route::post('/banner/create',[BannerController::class,'create'])->name('bannerCreate');
    Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('bannerEdit');
    Route::post('/banner/update/{id}',[BannerController::class,'update'])->name('bannerUpdate');
    Route::delete('/banner/delete/{id}',[BannerController::class,'destroy'])->name('bannerDestroy');

    //Bus Gate List
    Route::get('/bus-gate',[BusGateController::class,'index'])->name('busGateIndex');
    Route::get('/bus-gate/add',[BusGateController::class,'add'])->name('busGateAdd');
    Route::post('/bus-gate/create',[BusGateController::class,'create'])->name('busGateCreate');
    Route::get('/bus-gate/edit/{id}',[BusGateController::class,'edit'])->name('busGateEdit');
    Route::post('/bus-gate/update/{id}',[BusGateController::class,'update'])->name('busGateUpdate');
    Route::delete('/bus-gate/delete/{id}',[BusGateController::class,'destroy'])->name('busGateDestroy');

    // Bus Ticket Booking
    Route::get('/bus-ticket-booking',[BusTicketBookingController::class,'index'])->name('busTicketBookingIndex');
    Route::get('/bus-ticket-booking/add',[BusTicketBookingController::class,'add'])->name('busTicketBookingAdd');
    Route::post('/bus-ticket-booking/create',[BusTicketBookingController::class,'create'])->name('busTicketBookingCreate');
    Route::get('/bus-ticket-booking/edit/{id}',[BusTicketBookingController::class,'edit'])->name('busTicketBookingEdit');
    Route::post('/bus-ticket-booking/update/{id}',[BusTicketBookingController::class,'update'])->name('busTicketBookingUpdate');
    Route::delete('/bus-ticket-booking/delete/{id}',[BusTicketBookingController::class,'destroy'])->name('busTicketBookingDestroy');

    // Delivery
    Route::get('/delivery',[DeliveryController::class,'index'])->name('deliveryIndex');
    Route::get('/delivery/add',[DeliveryController::class,'add'])->name('deliveryAdd');
    Route::post('/delivery/create',[DeliveryController::class,'create'])->name('deliveryCreate');
    Route::get('/delivery/edit/{id}',[DeliveryController::class,'edit'])->name('deliveryEdit');
    Route::post('/delivery/update/{id}',[DeliveryController::class,'update'])->name('deliveryUpdate');
    Route::delete('/delivery/delete/{id}',[DeliveryController::class,'destroy'])->name('deliveryDestroy');

    // Delivery Charges
    Route::get('/deliverycharges',[DeliveryChargesController::class,'index'])->name('deliverychargesIndex');
    Route::get('/deliverycharges/add',[DeliveryChargesController::class,'add'])->name('deliverychargesAdd');
    Route::post('/deliverycharges/create',[DeliveryChargesController::class,'create'])->name('deliverychargesCreate');
    Route::get('/deliverycharges/edit/{id}',[DeliveryChargesController::class,'edit'])->name('deliverychargesEdit');
    Route::post('/deliverycharges/update/{id}',[DeliveryChargesController::class,'update'])->name('deliverychargesUpdate');
    Route::delete('/deliverycharges/delete/{id}',[DeliveryChargesController::class,'destroy'])->name('deliverychargesDestroy');

     Route::get('/deliverydetailform',[DeliveryChargesController::class,'deliverydetailfrom'])->name('deliverydetailForm');

    // Delivery Booking
    Route::get('/frontend/delivery-booking',[DeliveryBookingController::class,'index'])->name('deliverybookingIndex');

    Route::post('/frontend/delivery-booking/add',[DeliveryBookingController::class,'add'])->name('deliverybookingAdd');
    Route::get('/frontend/delivery-booking/addmore',[DeliveryBookingController::class,'addmore'])->name('deliverybookingAddmore');

    Route::post('/frontend/delivery-booking/create',[DeliveryBookingController::class,'create'])->name('deliverybookingCreate');
    Route::get('/frontend/delivery-booking/edit/{id}',[DeliveryBookingController::class,'edit'])->name('deliverybookingEdit');
    Route::post('/frontend/delivery-booking/update/{id}',[DeliveryBookingController::class,'update'])->name('deliverybookingUpdate');
    Route::delete('/frontend/delivery-booking/delete/{id}',[DeliveryBookingController::class,'destroy'])->name('deliverybookingDestroy');

    //delivery detail order
    Route::get('/frontend/delivery-detail-order',[DeliveryDetailOrderController::class,'index'])->name('deliverydetailorderIndex');
    Route::get('/frontend/receive_order',[DeliveryDetailOrderController::class,'receiveorderindex'])->name('receiveorderIndex');
    Route::post('/frontend/receive-order/create',[DeliveryDetailOrderController::class,'receiveordercreate'])->name('receiveorderCreate');
     Route::delete('/frontend/delivery-detail-order/delete/{id}',[DeliveryDetailOrderController::class,'destroy'])->name('deliverydetailorderDestroy');


    // Terms
    Route::get('/term',[TermController::class,'index'])->name('termIndex');
    Route::get('/term/add',[TermController::class,'add'])->name('termAdd');
    Route::post('/term/create',[TermController::class,'create'])->name('termCreate');
    Route::get('/term/edit/{id}',[TermController::class,'edit'])->name('termEdit');
    Route::post('/term/update/{id}',[TermController::class,'update'])->name('termUpdate');
    Route::delete('/term/delete/{id}',[TermController::class,'destroy'])->name('termDestroy');

    // Hotel
    Route::get('/hotel',[HotelController::class,'index'])->name('hotelIndex');
    Route::get('/hotel/add',[HotelController::class,'add'])->name('hotelAdd');
    Route::post('/hotel/create',[HotelController::class,'create'])->name('hotelCreate');
    Route::get('/hotel/edit/{id}',[HotelController::class,'edit'])->name('hotelEdit');
    Route::get('/hotel/detail/{id}',[HotelController::class,'view'])->name('hotelView');
    Route::post('/hotel/update/{id}',[HotelController::class,'update'])->name('hotelUpdate');
    Route::delete('/hotel/delete/{id}',[HotelController::class,'destroy'])->name('hotelDestroy');

    //Roomtype
    Route::get('/roomtype',[RoomTypeController::class,'index'])->name('roomtypeIndex');
    Route::get('/roomtype/add',[RoomTypeController::class,'add'])->name('roomtypeAdd');
    Route::post('/roomtype/create',[RoomTypeController::class,'create'])->name('roomtypeCreate');
    Route::get('/roomtype/edit/{id}',[RoomTypeController::class,'edit'])->name('roomtypeEdit');
    Route::post('/roomtype/update/{id}',[RoomTypeController::class,'update'])->name('roomtypeUpdate');
    Route::delete('/roomtype/delete/{id}',[RoomTypeController::class,'destroy'])->name('roomtypeDestroy');

    //Roomtype Category
    Route::get('/roomtypecategory',[RoomTypeCategoryController::class,'index'])->name('roomtypecategoryIndex');
    Route::get('/roomtypecategory/add',[RoomTypeCategoryController::class,'add'])->name('roomtypecategoryAdd');
    Route::post('/roomtypecategory/create',[RoomTypeCategoryController::class,'create'])->name('roomtypecategoryCreate');
    Route::get('/roomtypecategory/edit/{id}',[RoomTypeCategoryController::class,'edit'])->name('roomtypecategoryEdit');
    Route::post('/roomtypecategory/update/{id}',[RoomTypeCategoryController::class,'update'])->name('roomtypecategoryUpdate');
    Route::delete('/roomtypecategory/delete/{id}',[RoomTypeCategoryController::class,'destroy'])->name('roomtypecategoryDestroy');

    
    // Hotel Booking
    Route::get('/hotel-booking',[HotelBookingController::class,'index'])->name('hotelbookingIndex');
    Route::get('/hotel-booking/add',[HotelBookingController::class,'add'])->name('hotelbookingAdd');
    Route::post('/hotel-booking/create',[HotelBookingController::class,'create'])->name('hotelbookingCreate');
    Route::get('/hotel-booking/edit/{id}',[HotelBookingController::class,'edit'])->name('hotelbookingEdit');
    Route::post('/hotel-booking/update/{id}',[HotelBookingController::class,'update'])->name('hotelbookingUpdate');
    Route::delete('/hotel-booking/delete/{id}',[HotelBookingController::class,'destroy'])->name('hotelbookingDestroy');

    //Tour
    Route::get('/tour',[TourController::class,'index'])->name('tourIndex');
    Route::get('/tour/add',[TourController::class,'add'])->name('tourAdd');
    Route::get('/tour/detail/{id}',[TourController::class,'view'])->name('tourView');
    Route::post('/tour/create',[TourController::class,'create'])->name('tourCreate');
    Route::get('/tour/edit/{id}',[TourController::class,'edit'])->name('tourEdit');
    Route::post('/tour/update/{id}',[TourController::class,'update'])->name('tourUpdate');
    Route::delete('/tour/delete/{id}',[TourController::class,'destroy'])->name('tourDestroy');

    //Tour itineary
    Route::get('/touritineary',[TourItinearyController::class,'index'])->name('touritinearyIndex');
    Route::get('/touritineary/add',[TourItinearyController::class,'add'])->name('touritinearyAdd');
    Route::post('/touritineary/create',[TourItinearyController::class,'create'])->name('touritinearyCreate');
    Route::get('/touritineary/edit/{id}',[TourItinearyController::class,'edit'])->name('touritinearyEdit');
    Route::post('/touritineary/update/{id}',[TourItinearyController::class,'update'])->name('touritinearyUpdate');
    Route::delete('/touritineary/delete/{id}',[TourItinearyController::class,'destroy'])->name('touritinearyDestroy');

    //TourCategory
    Route::get('/tourcategory',[TourCategoryController::class,'index'])->name('tourcategoryIndex');
    Route::get('/tourcategory/add',[TourCategoryController::class,'add'])->name('tourcategoryAdd');
    Route::post('/tourcategory/create',[TourCategoryController::class,'create'])->name('tourcategoryCreate');
    Route::get('/tourcategory/edit/{id}',[TourCategoryController::class,'edit'])->name('tourcategoryEdit');
    Route::post('/tourcategory/update/{id}',[TourCategoryController::class,'update'])->name('tourcategoryUpdate');
    Route::delete('/tourcategory/delete/{id}',[TourCategoryController::class,'destroy'])->name('tourcategoryDestroy');

    //TourDestination
    Route::get('/tourdestination',[TourDestinationController::class,'index'])->name('tourdestinationIndex');
    Route::get('/tourdestination/add',[TourDestinationController::class,'add'])->name('tourdestinationAdd');
    Route::post('/tourdestination/create',[TourDestinationController::class,'create'])->name('tourdestinationCreate');
    Route::get('/tourdestination/edit/{id}',[TourDestinationController::class,'edit'])->name('tourdestinationEdit');
    Route::post('/tourdestination/update/{id}',[TourDestinationController::class,'update'])->name('tourdestinationUpdate');
    Route::delete('/tourdestination/delete/{id}',[TourDestinationController::class,'destroy'])->name('tourdestinationDestroy');

    // Container Booking
    Route::get('/tour-booking',[TourBookingController::class,'index'])->name('tourBookingIndex');
    Route::get('/tour-booking/add',[TourBookingController::class,'add'])->name('tourBookingAdd');
    Route::post('/tour-booking/create',[TourBookingController::class,'create'])->name('tourBookingCreate');
    Route::get('/tour-booking/edit/{id}',[TourBookingController::class,'edit'])->name('tourBookingEdit');
    Route::post('/tour-booking/update/{id}',[TourBookingController::class,'update'])->name('tourBookingUpdate');
    Route::delete('/tour-booking/delete/{id}',[TourBookingController::class,'destroy'])->name('tourBookingDestroy');

     // Car Owner List
    Route::get('/car_owner',[CarOwnerController::class,'index'])->name('carownerIndex');
    Route::get('/car_owner/add',[CarOwnerController::class,'add'])->name('carownerAdd');
    Route::post('/car_owner/create',[CarOwnerController::class,'create'])->name('carownerCreate');
    Route::get('/car_owner/edit/{id}',[CarOwnerController::class,'edit'])->name('carownerEdit');
    Route::post('/car_owner/update/{id}',[CarOwnerController::class,'update'])->name('carownerUpdate');
    Route::delete('/car_owner/delete/{id}',[CarOwnerController::class,'destroy'])->name('carownerDestroy');

    //car Driver List
    Route::get('/car_driver',[CarDriverController::class,'index'])->name('cardriverIndex');
    Route::get('/car_driver/add',[CarDriverController::class,'add'])->name('cardriverAdd');
    Route::post('/car_driver/create',[CarDriverController::class,'create'])->name('cardriverCreate');
    Route::get('/car_driver/edit/{id}',[CarDriverController::class,'edit'])->name('cardriverEdit');
    Route::post('/car_driver/update/{id}',[CarDriverController::class,'update'])->name('cardriverUpdate');
    Route::delete('/car_driver/delete/{id}',[CarDriverController::class,'destroy'])->name('cardriverDestroy');
});

// Change language session condition
Route::get('/language/{lang}', function ($lang){
    $lang = strtolower($lang);
    if ($lang == 'en'|| $lang == 'mm')
    {
        session([
            'locale' => $lang
        ]);
    }
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| This is the end of Blade (front-end) Routes
|-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\
*/
