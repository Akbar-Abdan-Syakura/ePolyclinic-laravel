<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\ManagementAccess\Role;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // get all user by session browser
        $user = \Auth::user();

        // checking validation middleware
        // system on or not
        // user active or not
        if (!app()->runningInConsole() && $user) {
            // get all role by user
            $roles = Role::with('permission')->get();
            $permissionsArray = [];

            // looping for role
            foreach ($roles as $role) {
                // looping for permission
                foreach ($role->permission as $permission) {
                    $permissionsArray[$permission->title][] = $role->id;
                }
            }
            // check user role
            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (\App\Models\User $user)
                use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }
        // return all middleware
        return $next($request);
    }
}
