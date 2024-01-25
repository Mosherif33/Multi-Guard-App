<?php

namespace Src\Domain\Categories\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Src\Domain\Categories\Entities\Categories::class => \Src\Domain\Categories\Policies\CategoriesPolicy::class,
		###POLICIES###
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
