<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Configuration
    |--------------------------------------------------------------------------
    */

    'login_on_server' => true,
    'login_view' => 'login',

    /*
     |--------------------------------------------------------------------------
     | Brokers Configuration
     |--------------------------------------------------------------------------
     */

    // Table used in andcarpi\LaravelSSOServer\Models\Broker model
    'brokersTable' => 'brokers',
    'brokersModel' => andcarpi\LaravelSSOServer\Models\Broker::class,

    /*
     |--------------------------------------------------------------------------
     | User Configuration
     |--------------------------------------------------------------------------
     */

    'usersModel' => \App\User::class,

    'userTableName' => 'users',
    'userUserNameField' => 'email',
    'userPasswordField' => 'password',

    // Logged in user fields sent to brokers.
    'userFields' => [
        // Return array field name => database column name
        'id' => 'id',
    ],

];
