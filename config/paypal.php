<?php
return [
 
   'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'client_secret'    =>env('PAYPAL_SANDBOX_CLIENT_SECRET',),
    ],

   ];