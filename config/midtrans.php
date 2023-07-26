<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     midtrans.php
 * @LastModified 4/11/19 1:58 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

return [
    'server_key'      => env('MT_SERVER_KEY', 'Midtrans'),
    'client_key'	  => env('MT_CLIENT_KEY', 'Midtrans'),
    'link_production' => env('MT_LINK_PRODUCTION', 'Midtrans'),
    'link_sandbox' 	  => env('MT_LINK_SANDBOX', 'Midtrans'),
    'is_production'   => env('MT_IS_PRODUCTION', 'Midtrans'),
    'expiry'          => env('MT_EXPIRY', 'Midtrans'),
];
