<?php

namespace App\Providers;

use App\Models\Issue;
use App\Policies\IssuePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Issue::class => IssuePolicy::class,
        // Add other models and policies here if needed
    ];

    protected $permissions = [
        'create-issue' => 'Create Issues',
        'update-issue' => 'Update Issues',
        'view-issue' => 'View Issues',
    ];

    public function boot()
    {
        $this->registerPolicies();

        foreach ($this->permissions as $key => $value) {
            Gate::define($key, function ($user) use ($key) {
                return $user->hasPermissionTo($key);
            });
        }
    }
}
