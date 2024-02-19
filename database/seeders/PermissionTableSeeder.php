<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'car.view',
           'car.add',
           'car.edit',
           'car.delete',

           'bus.view',
           'bus.add',
           'bus.edit',
           'bus.delete',

           'cargo.view',
           'cargo.add',
           'cargo.edit',
           'cargo.delete',

           'container.view',
           'container.add',
           'container.edit',
           'container.delete',

           'tour.view',
           'tour.add',
           'tour.edit',
           'tour.delete',

           'hotel.view',
           'hotel.add',
           'hotel.edit',
           'hotel.delete',

           'delivery.view',
           'delivery.add',
           'delivery.edit',
           'delivery.delete',

           'country.view',
           'country.add',
           'country.edit',
           'country.delete',

           'state.view',
           'state.add',
           'state.edit',
           'state.delete',

           'city.view',
           'city.add',
           'city.edit',
           'city.delete',

           'brand.view',
           'brand.add',
           'brand.edit',
           'brand.delete',

           'model.view',
           'model.add',
           'model.edit',
           'model.delete',

            'bus-ticket-booking.view',
            'bus-ticket-booking.add',
            'bus-ticket-booking.edit',
            'bus-ticket-booking.delete',

            'bus-gate.view',
            'bus-gate.add',
            'bus-gate.edit',
            'bus-gate.delete',

            'tour-booking.view',
            'tour-booking.add',
            'tour-booking.edit',
            'tour-booking.delete',


            'tour-category.view',
            'tour-category.add',
            'tour-category.edit',
            'tour-category.delete',


            'tour-destination.view',
            'tour-destination.add',
            'tour-destination.edit',
            'tour-destination.delete',

            'hotel-booking.view',
            'hotel-booking.add',
            'hotel-booking.edit',
            'hotel-booking.delete',

            'car-booking.view',
            'car-booking.add',
            'car-booking.edit',
            'car-booking.delete',

            'cargo-booking.view',
            'cargo-booking.add',
            'cargo-booking.edit',
            'cargo-booking.delete',

            'container-booking.view',
            'container-booking.add',
            'container-booking.edit',
            'container-booking.delete',

            'customer.view',
            'customer.add',
            'customer.edit',
            'customer.delete',

            'agent.view',
            'agent.add',
            'agent.edit',
            'agent.delete',

            'owner.view',
            'owner.add',
            'owner.edit',
            'owner.delete',

            'driver.view',
            'driver.add',
            'driver.edit',
            'driver.delete',

            'banner.view',
            'banner.add',
            'banner.edit',
            'banner.delete',

            'car-type.view',
            'car-type.add',
            'car-type.edit',
            'car-type.delete',

        ];

        $title = [
           
           'car View',
           'car Create',
           'Modify car',
           'Delete car',

           'bus View',
           'bus Create',
           'Modify bus',
           'Delete bus',

           'cargo View',
           'cargo Create',
           'Modify cargo',
           'Delete cargo',

           'container View',
           'container Create',
           'Modify container',
           'Delete container',

           'tour View',
           'tour Create',
           'Modify tour',
           'Delete tour',

           'hotel View',
           'hotel Create',
           'Modify hotel',
           'Delete hotel',

           'delivery View',
           'delivery Create',
           'Modify delivery',
           'Delete delivery',

           'country View',
           'country Create',
           'Modify country',
           'Delete country',

           'state View',
           'state Create',
           'Modify state',
           'Delete state',

           'city View',
           'city Create',
           'Modify city',
           'Delete city',

           'brand View',
           'brand Create',
           'Modify brand',
           'Delete brand',

           'model View',
           'model Create',
           'Modify model',
           'Delete model',

            'bus-ticket-booking View',
            'bus-ticket-booking Create',
            'Modify bus-ticket-booking',
            'Delete bus-ticket-booking',

            'bus-gate View',
            'bus-gate Create',
            'Modify bus-gate',
            'Delete bus-gate',

            'tour-booking View',
            'tour-booking Create',
            'Modify tour-booking',
            'Delete tour-booking',


            'tour-category View',
            'tour-category Create',
            'Modify tour-category',
            'Delete tour-category',


            'tour-destination View',
            'tour-destination Create',
            'Modify tour-destination',
            'Delete tour-destination',

            'hotel-booking View',
            'hotel-booking Create',
            'Modify hotel-booking',
            'Delete hotel-booking',

            'car-booking View',
            'car-booking Create',
            'Modify car-booking',
            'Delete car-booking',

            'cargo-booking View',
            'cargo-booking Create',
            'Modify cargo-booking',
            'Delete cargo-booking',

            'container-booking View',
            'container-booking Create',
            'Modify container-booking',
            'Delete container-booking',

            'customer View',
            'customer Create',
            'Modify customer',
            'Delete customer',

            'agent View',
            'agent Create',
            'Modify agent',
            'Delete agent',

            'owner View',
            'owner Create',
            'Modify owner',
            'Delete owner',

            'driver View',
            'driver Create',
            'Modify driver',
            'Delete driver',

            'banner View',
            'banner Create',
            'Modify banner',
            'Delete banner',

            'car-type View',
            'car-type Create',
            'Modify car-type',
            'Delete car-type',
        ];
   
        foreach ($permissions as $key => $permission) {
            Permission::create(['name' => $permission, 'title' => $title[$key]]);
        }
    }
}
