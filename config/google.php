<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename google.php
 * @LastModified 01/04/2020, 03:35
 */

return [
        'api' => [
            'api_key' => env('GOOGLE_API_KEY', 'GMaps'),
            'fcm' => env('GOOGLE_FCM_WEB_API_KEY', 'FCM'),
            'fcm_server_key' => env('GOOGLE_FCM_WEB_API_KEY', 'SERVER_KEY'),
            'fcm_server_id' => env('GOOGLE_FCM_SENDER_ID', 'SERVER_ID'),
            'fcm_web_push_sertificates' => env('GOOGLE_FCM_WEB_API_KEY', 'WEB_PUSH_SERTIFICATES')
        ],
];
