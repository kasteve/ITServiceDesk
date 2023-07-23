<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Permission Models
    |--------------------------------------------------------------------------
    |
    | When using the "HasRoles" trait from this package, we need to know which
    | Eloquent models should be used to retrieve your permissions and roles.
    | Of course, it is often just the default "Permission" and "Role" model
    | but you may use whatever you like.
    |
    */
    'models' => [
        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * model should be used to retrieve your permissions. Of course, it
         * is often just the default "Permission" model but you may use
         * whatever you like.
         */
        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * model should be used to retrieve your roles. Of course, it
         * is often just the default "Role" model but you may use
         * whatever you like.
         */
        'role' => Spatie\Permission\Models\Role::class,

        /*
         * When using the "HasPermissions" trait from this package, we need to
         * know which model should be used to retrieve your teams. Of course,
         * it is often just the default "Team" model but you may use
         * whatever you like.
         */
        'team' => App\Models\Team::class,
    ],
];
