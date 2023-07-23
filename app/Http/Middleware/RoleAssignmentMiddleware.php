<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleAssignmentMiddleware
{
    public function handle($request, Closure $next)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the desired role (e.g., Role with ID 1)
        $role = Role::find(1);

        // Attach the role to the user
        $user->roles()->attach($role);

        return $next($request);
    }
}
