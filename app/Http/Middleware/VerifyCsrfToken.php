<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Support\Str;

class VerifyCsrfToken extends BaseVerifier {

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
            //
    ];
    
    public function handle($request, Closure $next) {
        if (Str::startsWith($request->getRequestUri(), '/admin/booktests/detail')) {
            return $next($request);
        }
        if (Str::startsWith($request->getRequestUri(), '/admin/booktests/getAjax')) {
            return $next($request);
        }
        if (Str::startsWith($request->getRequestUri(), '/admin/sanpham/getAjax')) {
            return $next($request);
        }
        if (Str::startsWith($request->getRequestUri(), '/admin/ban/getAjax')) {
            return $next($request);
        }
        if (Str::startsWith($request->getRequestUri(), '/admin/chi/getAjax')) {
            return $next($request);
        }
        if (Str::startsWith($request->getRequestUri(), '/admin/hoadon/getAjax')) {
            return $next($request);
        }
        return parent::handle($request, $next);
    }

}
