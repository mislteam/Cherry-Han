<?php

return [
    'adminuser' => [
        'title'          => 'Admin User',
        'title_singular' => 'Management',
    ],
    'permission'     => [
        'title'          => 'Manage Permissions',
        'title_singular' => 'Permissions',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Comment',
            'name'              => 'Title',
            'roles'             => 'Roles',
            'permissions'       => 'Permissions',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Manage Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Roles',
            'title'             => 'Comment',
            'name'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Roll permission',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'setting' => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
    ],
    'country' => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Countries',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'code'              => 'Country Code',
            'status'            => 'Status',
            'phone_code'        => 'Phone Code',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'state' => [
        'title'          => 'States',
        'title_singular' => 'State',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'States',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'country_id'        => 'Country',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'city' => [
        'title'          => 'Cities',
        'title_singular' => 'City',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'cities',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'state_id'        => 'State',
            'country_id'        => 'Country',
            'state_id'        => 'State',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'category' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Category',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'sub_category' => [
        'title'          => 'Sub Categories',
        'title_singular' => 'Sub Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Sub Category',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'category_id'       => 'Category Name',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'sub_sub_category' => [
        'title'          => 'Child Categories',
        'title_singular' => 'Child Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'image'             => 'Image',
            'roles'             => 'Child Category',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'category_id'       => 'Category Name',
            'sub_category_id'   => 'Sub Category Name',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'car' => [
        'title'          => 'Cars',
        'title_singular' => 'Car',
        'name'           => [
            'label'         => 'Car Name',
            'placeholder'   => '',
        ],
        'model_id'           => [
            'label'         => 'Car Model',
            'placeholder'   => '',
        ],
        'brand_id'           => [
            'label'         => 'Car Brand',
            'placeholder'   => '',
        ],
        'width'           => [
            'label'         => 'width',
            'placeholder'   => '',
        ],
        'height'           => [
            'label'         => 'height',
            'placeholder'   => '',
        ],
        'trip_type'           => [
            'label'         => 'Trip Type',
            'placeholder'   => '',
        ],
        'day_type'           => [
            'label'         => 'Day type',
            'placeholder'   => '',
        ],
        'country_id'           => [
            'label'         => 'Country',
            'placeholder'   => '',
        ],
        'state_id'           => [
            'label'         => 'State',
            'placeholder'   => '',
        ],
        'city_id'           => [
            'label'         => 'City',
            'placeholder'   => '',
        ],
        'seat_no'           => [
            'label'         => 'No. of Seat',
            'placeholder'   => '',
        ],
        'ac'           => [
            'label'         => 'AC',
            'placeholder'   => '',
        ],
        'wheel_drive'           => [
            'label'         => 'Wheel Drive',
            'placeholder'   => '',
        ],
        'abs'           => [
            'label'         => 'ABS',
            'placeholder'   => '',
        ],
        'airbag'           => [
            'label'         => 'Air Bag',
            'placeholder'   => '',
        ],
        'service'           => [
            'label'         => 'Service',
            'placeholder'   => '',
        ],
        'laggage'           => [
            'label'         => 'Laggage',
            'placeholder'   => '',
        ],
        'license_type'           => [
            'label'         => 'License Type',
            'placeholder'   => '',
        ],
        'driver_id'           => [
            'label'         => 'Choose Driver',
            'placeholder'   => '',
        ],
        'ownner_id'           => [
            'label'         => 'Car Ownner',
            'placeholder'   => '',
        ],
        'feature_photo'           => [
            'label'         => 'Feature Photo',
            'placeholder'   => '',
        ],
        'gallery'           => [
            'label'         => 'Gallery',
            'placeholder'   => '',
        ],
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Cars',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'carmodel' => [
        'title'          => 'Countries',
        'title_singular' => 'Car Model',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Countries',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'code'              => 'Car Model',
            'status'            => 'Status',
            'phone_code'        => 'Phone Code',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'carbrand' => [
        'title'          => 'Countries',
        'title_singular' => 'Car Brand',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Countries',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'code'              => 'Car Brand',
            'status'            => 'Status',
            'phone_code'        => 'Phone Code',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],

    'container' => [
        'title'          => 'Containers',
        'title_singular' => 'Container',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Container',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'cargo' => [
        'title'          => 'Cargoes',
        'title_singular' => 'Cargo',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Cargo',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'delivery' => [
        'title'          => 'Delivery',
        'title_singular' => 'Delivery',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Delivery',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'message' => [
        'title'          => 'Message',
        'title_singular' => 'Message',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Message',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'bus-ticket' => [
        'title'          => 'Bus Tickets',
        'title_singular' => 'Bus Ticket',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'bus-tickets',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'tour' => [
        'title'          => 'Tours',
        'title_singular' => 'Travel & Tour',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'roles'             => 'Tour',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],

    'hotel' => [
        'title'          => 'Hotels',
        'title_singular' => 'Hotel',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'image'             => 'Image',
            'title'             => 'Title',
            'title_helper'      => '',
            'roles'             => 'Hotel',
            'name'              => 'Name',
            'status'            => 'Status',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
        'booking'        => [
            'title'              => 'Booking',
        ],
    ],
];
