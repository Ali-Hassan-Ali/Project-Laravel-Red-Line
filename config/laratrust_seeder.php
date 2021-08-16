<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        
        'super_admin' => [
            'dashboard'  => 'r',
            'admin'      => 'u',
            'users'      => 'c,r,u,d',
            'clients'    => 'c,r,u,d',
            'orders'     => 'c,r,u,d',
            'categoreys' => 'c,r,u,d',
            'products'   => 'c,r,u,d',
            'cupons'     => 'c,r,u,d',
            'settings'   => 'c,r,u,d',
            'gallerys'   => 'c,r,u,d',
            'supports'   => 'c,r,u,d',
            'payments'   => 'c,r,u,d',
        ],

        'admin' => [
            'dashboard' => 'r',
        ],

        'clients' => []
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
