<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;
use Session;

class SentinelAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $method = $request->method();

        $route = $request->route();
        if (!Sentinel::check()) {
            if ($method == "GET" || $method == "get") {
                Session::put('route', $route->getName());
                Session::put('parameters', $route->parameters());
            }
            return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
        } else {
            if (Sentinel::hasAccess("admin")) {
                return $next($request);
            }
            $routeName = $route->getName();
            if ($routeName == "dashboard") {
                return $next($request);
            }
            if (!Sentinel::hasAccess($routeName)) {
                return Redirect::to('/')->withErrors('Permission denied.');
            }
//            //Check Permissions 
//            $role = \Sentinel::findRoleById(1);
//            $role->permissions = [
//                'admin' => true,
//                'admin.roles' => true,
//                'user.delete' => false,
//            ];
//            $role->save();
//
//
//            $user = Sentinel::findById(1);
//            
//            $permissions = Sentinel::getResultingPermissionsFor($user);
//            dd($permissions);
//
//            $user->permissions = [
//                'admin' => true,
//                'admin.roles' => true,
//                'user.delete' => false,
//            ];
//
//            $user->save();
//
//            dd(Sentinel::hasAccess("admin.roles"));
//            if (!Sentinel::inRole('admin')) {
//                return Redirect::to('my-account');
//            }
        }

        return $next($request);
    }

}
