<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/register',
        '/login',
        '/logout',
        '/profile',
        '/payments/notification',
        '/whatsapp/notification/*',
        '/whatsapp/webhook/*',
        '/pepipost/webhook'
    ];
}
