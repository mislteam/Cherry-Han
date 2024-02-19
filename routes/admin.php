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

use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Car\CarBookingController;
use App\Http\Controllers\Brand\CarModelController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\CarType\CarTypeController;
use App\Http\Controllers\Owner\CarOwnerController;
use App\Http\Controllers\Driver\CarDriverController;
use App\Http\Controllers\Banner\BannerController;

use App\Http\Controllers\Container\ContainerController;
use App\Http\Controllers\Container\ContainerBookingController;

use App\Http\Controllers\Cargo\CargoController;
use App\Http\Controllers\Cargo\CargoBookingController;

use App\Http\Controllers\Bus\BusTicketController;
use App\Http\Controllers\Bus\BusTicketBookingController;
use App\Http\Controllers\Bus\BusGateController;

use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\Tour\TourBookingController;
use App\Http\Controllers\Tour\TourCategoryController;
use App\Http\Controllers\Tour\TourDestinationController;

use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\HotelBookingController;

use App\Http\Controllers\Delivery\DelieryController;
use App\Http\Controllers\Delivary\DelieryBookingController;

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

Route::get('/', function (){
    return redirect()->route('home');
})->name('welcome');

// Admin Web pages
Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){

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

    /*
    // Customers
    Route::get('/customer',[ApiUserController::class,'index'])->name('apiuserIndex');
    Route::get('/customer/add',[ApiUserController::class,'add'])->name('apiuserAdd');
    Route::post('/customer/create',[ApiUserController::class,'create'])->name('apiuserCreate');
    Route::get('/customer/show/{id}',[ApiUserController::class,'show'])->name('apiuserShow');
    Route::get('/customer/edit/{id}',[ApiUserController::class,'edit'])->name('apiuserEdit');
    Route::post('/customer/update/{id}',[ApiUserController::class,'update'])->name('apiuserUpdate');
    Route::delete('/customer/delete/{id}',[ApiUserController::class,'destroy'])->name('apiuserDestroy');
    Route::delete('/customer-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');

    //Agents
    Route::get('/customer',[ApiUserController::class,'index'])->name('apiuserIndex');
    Route::get('/customer/add',[ApiUserController::class,'add'])->name('apiuserAdd');
    Route::post('/customer/create',[ApiUserController::class,'create'])->name('apiuserCreate');
    Route::get('/customer/show/{id}',[ApiUserController::class,'show'])->name('apiuserShow');
    Route::get('/customer/edit/{id}',[ApiUserController::class,'edit'])->name('apiuserEdit');
    Route::post('/customer/update/{id}',[ApiUserController::class,'update'])->name('apiuserUpdate');
    Route::delete('/customer/delete/{id}',[ApiUserController::class,'destroy'])->name('apiuserDestroy');
    Route::delete('/customer-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');

    */

    Route::get('/api-user',[ApiUserController::class,'index'])->name('apiuserIndex');
    Route::get('/api-user/add',[ApiUserController::class,'add'])->name('apiuserAdd');
    Route::post('/api-user/create',[ApiUserController::class,'create'])->name('apiuserCreate');
    Route::get('/api-user/show/{id}',[ApiUserController::class,'show'])->name('apiuserShow');
    Route::get('/api-user/edit/{id}',[ApiUserController::class,'edit'])->name('apiuserEdit');
    Route::post('/api-user/update/{id}',[ApiUserController::class,'update'])->name('apiuserUpdate');
    Route::delete('/api-user/delete/{id}',[ApiUserController::class,'destroy'])->name('apiuserDestroy');
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
    Route::get('/role/edit/{id}',[RoleController::class,'edit'])->name('roleEdit');
    Route::post('/role/update/{id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('roleDestroy');

    // Country
    Route::get('/country',[CountryController::class,'index'])->name('countryIndex');
    Route::get('/country/add',[CountryController::class,'add'])->name('countryAdd');
    Route::post('/country/create',[CountryController::class,'create'])->name('countryCreate');
    Route::get('/country/edit/{id}',[CountryController::class,'edit'])->name('countryEdit');
    Route::post('/country/update/{id}',[CountryController::class,'update'])->name('countryUpdate');
    Route::delete('/country/delete/{id}',[CountryController::class,'destroy'])->name('countryDestroy');

    // State
    Route::get('/state',[StateController::class,'index'])->name('stateIndex');
    Route::get('/state/add',[StateController::class,'add'])->name('stateAdd');
    Route::post('/state/create',[StateController::class,'create'])->name('stateCreate');
    Route::get('/state//edit/{id}',[StateController::class,'edit'])->name('stateEdit');
    Route::post('/state/update/{id}',[StateController::class,'update'])->name('stateUpdate');
    Route::delete('/state/delete/{id}',[StateController::class,'destroy'])->name('stateDestroy');

    // City
    Route::get('/city',[CityController::class,'index'])->name('cityIndex');
    Route::get('/city/add',[CityController::class,'add'])->name('cityAdd');
    Route::post('/city/create',[CityController::class,'create'])->name('cityCreate');
    Route::get('/city/edit/{id}',[CityController::class,'edit'])->name('cityEdit');
    Route::post('/city/update/{id}',[CityController::class,'update'])->name('cityUpdate');
    Route::delete('/city/delete/{id}',[CityController::class,'destroy'])->name('cityDestroy');

    // Category
    Route::get('/category',[CategoryController::class,'index'])->name('categoryIndex');
    Route::get('/category/add',[CategoryController::class,'add'])->name('categoryAdd');
    Route::post('/category/create',[CategoryController::class,'create'])->name('categoryCreate');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('categoryEdit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('categoryUpdate');
    Route::delete('/category/delete/{id}',[CategoryController::class,'destroy'])->name('categoryDestroy');

    // SubCategory
    Route::get('/sub-category',[SubCategoryController::class,'index'])->name('subcategoryIndex');
    Route::get('/sub-category/add',[SubCategoryController::class,'add'])->name('subcategoryAdd');
    Route::post('/sub-category/create',[SubCategoryController::class,'create'])->name('subcategoryCreate');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('subcategoryEdit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('subcategoryUpdate');
    Route::delete('/sub-category/delete/{id}',[SubCategoryController::class,'destroy'])->name('subcategoryDestroy');

    // SubSubCategory
    Route::get('/child-category',[SubSubCategoryController::class,'index'])->name('subsubcategoryIndex');
    Route::get('/child-category/add',[SubSubCategoryController::class,'add'])->name('subsubcategoryAdd');
    Route::post('/child-category/create',[SubSubCategoryController::class,'create'])->name('subsubcategoryCreate');
    Route::get('/child-category/edit/{id}',[SubSubCategoryController::class,'edit'])->name('subsubcategoryEdit');
    Route::post('/child-category/update/{id}',[SubSubCategoryController::class,'update'])->name('subsubcategoryUpdate');
    Route::delete('/child-category/delete/{id}',[SubSubCategoryController::class,'destroy'])->name('subsubcategoryDestroy');


    // Car List
    Route::get('/cars',[CarController::class,'index'])->name('carsIndex');
    Route::get('/cars/detail/{id}',[CarController::class,'view'])->name('carsView');
    Route::get('/cars/add',[CarController::class,'add'])->name('carsAdd');
    Route::post('/cars/create',[CarController::class,'create'])->name('carsCreate');
    Route::get('/cars/edit/{id}',[CarController::class,'edit'])->name('carsEdit');
    Route::post('/cars/update/{id}',[CarController::class,'update'])->name('carsUpdate');
    Route::delete('/cars/delete/{id}',[CarController::class,'destroy'])->name('carsDestroy');

    // Car Booking
    Route::get('/car-booking',[CarBookingController::class,'index'])->name('carsbookingIndex');
    Route::get('/car-booking/add',[CarBookingController::class,'add'])->name('carsbookingAdd');
    Route::post('/car-booking/create',[CarBookingController::class,'create'])->name('carsbookingCreate');
    Route::get('/car-booking/edit/{id}',[CarBookingController::class,'edit'])->name('carsbookingEdit');
    Route::post('/car-booking/update/{id}',[CarBookingController::class,'update'])->name('carsBookingUpdate');
    Route::delete('/car-booking/delete/{id}',[CarBookingController::class,'destroy'])->name('carsbookingDestroy');

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

    // Car Type
    Route::get('/car-type',[CarTypeController::class,'index'])->name('cartypeIndex');
    Route::get('/car-type/add',[CarTypeController::class,'add'])->name('cartypeAdd');
    Route::post('/car-type/create',[CarTypeController::class,'create'])->name('cartypeCreate');
    Route::get('/car-type/edit/{id}',[CarTypeController::class,'edit'])->name('cartypeEdit');
    Route::post('/car-type/update/{id}',[CarTypeController::class,'update'])->name('cartypeUpdate');
    Route::delete('/car-type/delete/{id}',[CarTypeController::class,'destroy'])->name('cartypeDestroy');

    // Container List
    Route::get('/container',[ContainerController::class,'index'])->name('containerIndex');
    Route::get('/container/detail/{id}',[ContainerController::class,'view'])->name('containerView');
    Route::get('/container/add',[ContainerController::class,'add'])->name('containerAdd');
    Route::post('/container/create',[ContainerController::class,'create'])->name('containerCreate');
    Route::get('/container/edit/{id}',[ContainerController::class,'edit'])->name('containerEdit');
    Route::post('/container/update/{id}',[ContainerController::class,'update'])->name('containerUpdate');
    Route::delete('/container/delete/{id}',[ContainerController::class,'destroy'])->name('containerDestroy');

    // Container Booking
    Route::get('/container-booking',[ContainerBookingController::class,'index'])->name('containerbookingIndex');
    Route::get('/container-booking/add',[ContainerBookingController::class,'add'])->name('containerbookingAdd');
    Route::post('/container-booking/create',[ContainerBookingController::class,'create'])->name('containerbookingCreate');
    Route::get('/container-booking/edit/{id}',[ContainerBookingController::class,'edit'])->name('containerbookingEdit');
    Route::post('/container-booking/update/{id}',[ContainerBookingController::class,'update'])->name('containerBookingUpdate');
    Route::delete('/container-booking/delete/{id}',[ContainerBookingController::class,'destroy'])->name('containerbookingDestroy');

    // Cargo List
    Route::get('/cargo',[CargoController::class,'index'])->name('cargoIndex');
    Route::get('/cargo/detail/{id}',[CargoController::class,'view'])->name('cargoView');
    Route::get('/cargo/add',[CargoController::class,'add'])->name('cargoAdd');
    Route::post('/cargo/create',[CargoController::class,'create'])->name('cargoCreate');
    Route::get('/cargo/edit/{id}',[CargoController::class,'edit'])->name('cargoEdit');
    Route::post('/cargo/update/{id}',[CargoController::class,'update'])->name('cargoUpdate');
    Route::delete('/cargo/delete/{id}',[CargoController::class,'destroy'])->name('cargoDestroy');

    // Cargo Booking
    Route::get('/cargo-booking',[CargoBookingController::class,'index'])->name('cargobookingIndex');
    Route::get('/cargo-booking/add',[CargoBookingController::class,'add'])->name('cargobookingAdd');
    Route::post('/cargo-booking/create',[CargoBookingController::class,'create'])->name('cargobookingCreate');
    Route::get('/cargo-booking/edit/{id}',[CargoBookingController::class,'edit'])->name('cargobookingEdit');
    Route::post('/cargo-booking/update/{id}',[CargoBookingController::class,'update'])->name('cargoBookingUpdate');
    Route::delete('/cargo-booking/delete/{id}',[CargoBookingController::class,'destroy'])->name('cargobookingDestroy');

    // Bus Ticket List
    Route::get('/bus-ticket',[BusTicketController::class,'index'])->name('busticketIndex');
    Route::get('/bus-ticket/add',[BusTicketController::class,'add'])->name('busticketAdd');
    Route::post('/bus-ticket/create',[BusTicketController::class,'create'])->name('busticketCreate');
    Route::get('/bus-ticket/edit/{id}',[BusTicketController::class,'edit'])->name('busticketEdit');
    Route::post('/bus-ticket/update/{id}',[BusTicketController::class,'update'])->name('busticketUpdate');
    Route::delete('/bus-ticket/delete/{id}',[BusTicketController::class,'destroy'])->name('busticketDestroy');

    // Bus Ticket Booking
    Route::get('/bus-ticket-booking',[BusTicketBookingController::class,'index'])->name('busticketbookingIndex');
    Route::get('/bus-ticket-booking/add',[BusTicketBookingController::class,'add'])->name('busticketbookingAdd');
    Route::post('/bus-ticket-booking/create',[BusTicketBookingController::class,'create'])->name('busticketbookingCreate');
    Route::get('/bus-ticket-booking/edit/{id}',[BusTicketBookingController::class,'edit'])->name('busticketbookingEdit');
    Route::post('/bus-ticket-booking/update/{id}',[BusTicketBookingController::class,'update'])->name('busticketBookingUpdate');
    Route::delete('/bus-ticket-booking/delete/{id}',[BusTicketBookingController::class,'destroy'])->name('busticketbookingDestroy');

    // Delivery
    Route::get('/delivery',[DeliveryController::class,'index'])->name('deliveryIndex');
    Route::get('/delivery/add',[DeliveryController::class,'add'])->name('deliveryAdd');
    Route::post('/delivery/create',[DeliveryController::class,'create'])->name('deliveryCreate');
    Route::get('/delivery/edit/{id}',[DeliveryController::class,'edit'])->name('deliveryEdit');
    Route::post('/delivery/update/{id}',[DeliveryController::class,'update'])->name('deliveryUpdate');
    Route::delete('/delivery/delete/{id}',[DeliveryController::class,'destroy'])->name('deliveryDestroy');

    // Delivery Booking
    Route::get('/delivery-booking',[DeliveryBookingController::class,'index'])->name('deliverybookingIndex');
    Route::get('/delivery-booking/add',[DeliveryBookingController::class,'add'])->name('deliverybookingAdd');
    Route::post('/delivery-booking/create',[DeliveryBookingController::class,'create'])->name('deliverybookingCreate');
    Route::get('/delivery-booking/edit/{id}',[DeliveryBookingController::class,'edit'])->name('deliverybookingEdit');
    Route::post('/delivery-booking/update/{id}',[DeliveryBookingController::class,'update'])->name('deliveryBookingUpdate');
    Route::delete('/delivery-booking/delete/{id}',[DeliveryBookingController::class,'destroy'])->name('deliverybookingDestroy');

    // Hotel
    Route::get('/hotel',[HotelController::class,'index'])->name('hotelIndex');
    Route::get('/hotel/add',[HotelController::class,'add'])->name('hotelAdd');
    Route::post('/hotel/create',[HotelController::class,'create'])->name('hotelCreate');
    Route::get('/hotel/edit/{id}',[HotelController::class,'edit'])->name('hotelEdit');
    Route::post('/hotel/update/{id}',[HotelController::class,'update'])->name('hotelUpdate');
    Route::delete('/hotel/delete/{id}',[HotelController::class,'destroy'])->name('hotelDestroy');

    // Hotel Booking
    Route::get('/hotel-booking',[HotelBookingController::class,'index'])->name('hotelbookingIndex');
    Route::get('/hotel-booking/add',[HotelBookingController::class,'add'])->name('hotelbookingAdd');
    Route::post('/hotel-booking/create',[HotelBookingController::class,'create'])->name('hotelbookingCreate');
    Route::get('/hotel-booking/edit/{id}',[HotelBookingController::class,'edit'])->name('hotelbookingEdit');
    Route::post('/hotel-booking/update/{id}',[HotelBookingController::class,'update'])->name('hotelBookingUpdate');
    Route::delete('/hotel-booking/delete/{id}',[HotelBookingController::class,'destroy'])->name('hotelbookingDestroy');

    // Travel & Tour
    Route::get('/tour',[TourController::class,'index'])->name('tourIndex');
    Route::get('/tour/add',[TourController::class,'add'])->name('tourAdd');
    Route::post('/tour/create',[TourController::class,'create'])->name('tourCreate');
    Route::get('/tour/edit/{id}',[TourController::class,'edit'])->name('tourEdit');
    Route::post('/tour/update/{id}',[TourController::class,'update'])->name('tourUpdate');
    Route::delete('/tour/delete/{id}',[TourController::class,'destroy'])->name('tourDestroy');

    // Travel & Tour Booking
    Route::get('/tour-booking',[TourBookingController::class,'index'])->name('tourbookingIndex');
    Route::get('/tour-booking/add',[TourBookingController::class,'add'])->name('tourbookingAdd');
    Route::post('/tour-booking/create',[TourBookingController::class,'create'])->name('tourbookingCreate');
    Route::get('/tour-booking/edit/{id}',[TourBookingController::class,'edit'])->name('tourbookingEdit');
    Route::post('/tour-booking/update/{id}',[TourBookingController::class,'update'])->name('tourBookingUpdate');
    Route::delete('/tour-booking/delete/{id}',[TourBookingController::class,'destroy'])->name('tourbookingDestroy');

    //tour-category
    Route::get('/tour-category',[TourCategoryController::class,'index'])->name('tourcategoryIndex');
    Route::get('/tour-category/add',[TourCategoryController::class,'add'])->name('tourcategoryAdd');
    Route::post('/tour-category/create',[TourCategoryController::class,'create'])->name('tourcategoryCreate');
    Route::get('/tour-category/edit/{id}',[TourCategoryController::class,'edit'])->name('tourcategoryEdit');
    Route::post('/tour-category/update/{id}',[TourCategoryController::class,'update'])->name('tourcategoryUpdate');
    Route::delete('/tour-category/delete/{id}',[TourCategoryController::class,'destroy'])->name('tourcategoryDestroy');

    //tour-category
    Route::get('/tour-destination',[TourDestinationController::class,'index'])->name('tourdestinationIndex');
    Route::get('/tour-destination/add',[TourDestinationController::class,'add'])->name('tourdestinationAdd');
    Route::post('/tour-destination/create',[TourDestinationController::class,'create'])->name('tourdestinationCreate');
    Route::get('/tour-destination/edit/{id}',[TourDestinationController::class,'edit'])->name('tourdestinationEdit');
    Route::post('/tour-destination/update/{id}',[TourDestinationController::class,'update'])->name('tourdestinationUpdate');
    Route::delete('/tour-destination/delete/{id}',[TourDestinationController::class,'destroy'])->name('tourdestinationDestroy');

    // Banner List
    Route::get('/banner',[BannerController::class,'index'])->name('bannerIndex');
    Route::get('/banner/add',[BannerController::class,'add'])->name('bannerAdd');
    Route::post('/banner/create',[BannerController::class,'create'])->name('bannerCreate');
    Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('bannerEdit');
    Route::post('/banner/update/{id}',[BannerController::class,'update'])->name('bannerUpdate');
    Route::delete('/banner/delete/{id}',[BannerController::class,'destroy'])->name('bannerDestroy');

    //Bus Gate List
    Route::get('/bus-gate',[BusGateController::class,'index'])->name('busgateIndex');
    Route::get('/bus-gate/add',[BusGateController::class,'add'])->name('busgateAdd');
    Route::post('/bus-gate/create',[BusGateController::class,'create'])->name('busgateCreate');
    Route::get('/bus-gate/edit/{id}',[BusGateController::class,'edit'])->name('busgateEdit');
    Route::post('/bus-gate/update/{id}',[BusGateController::class,'update'])->name('busgateUpdate');
    Route::delete('/bus-gate/delete/{id}',[BusGateController::class,'destroy'])->name('busgateDestroy');

    // Car Owner List
    Route::get('/car-owner',[CarOwnerController::class,'index'])->name('carownerIndex');
    Route::get('/car-owner/add',[CarOwnerController::class,'add'])->name('carownerAdd');
    Route::post('/car-owner/create',[CarOwnerController::class,'create'])->name('carownerCreate');
    Route::get('/car-owner/edit/{id}',[CarOwnerController::class,'edit'])->name('carownerEdit');
    Route::post('/car-owner/update/{id}',[CarOwnerController::class,'update'])->name('carownerUpdate');
    Route::delete('/car-owner/delete/{id}',[CarOwnerController::class,'destroy'])->name('carownerDestroy');

    //car Driver List
    Route::get('/car-driver',[CarDriverController::class,'index'])->name('cardriverIndex');
    Route::get('/car-driver/add',[CarDriverController::class,'add'])->name('cardriverAdd');
    Route::post('/car-driver/create',[CarDriverController::class,'create'])->name('cardriverCreate');
    Route::get('/car-driver/edit/{id}',[CarDriverController::class,'edit'])->name('cardriverEdit');
    Route::post('/car-driver/update/{id}',[CarDriverController::class,'update'])->name('cardriverUpdate');
    Route::delete('/car-driver/delete/{id}',[CarDriverController::class,'destroy'])->name('cardriverDestroy');


    // Banner Setting
    Route::get('/banner',[BannerController::class,'index'])->name('bannerIndex');
    Route::get('/banner/add',[BannerController::class,'add'])->name('bannerAdd');
    Route::post('/banner/create',[BannerController::class,'create'])->name('bannerCreate');
    Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('bannerEdit');
    Route::post('/banner/update/{id}',[BannerController::class,'update'])->name('bannerUpdate');
    Route::delete('/banner/delete/{id}',[BannerController::class,'destroy'])->name('bannerDestroy');

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
