<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Reply::class => \App\Policies\ReplyPolicy::class,
		 \App\Models\Topic::class => \App\Policies\TopicPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 動態返回模型對應的策略名稱，例如：'App\Model\User' => 'App\Policies\UserPolicy',
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return 'App\Policies\\'.class_basename($modelClass).'Policy';
        });

        Horizon::auth(function ($request) {
            return Auth::user()->hasRole('Founder');
        });
    }
}
