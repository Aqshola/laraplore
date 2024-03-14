<?php

namespace App\Providers;

use App\Utility\FeatureFlag;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FeatureFlagProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singleton=[
        FeatureFlag::class=>FeatureFlag::class
    ];


    public function provides():array{
        return [FeatureFlag::class];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
