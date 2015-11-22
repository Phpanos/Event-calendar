<?php

namespace Phpanos\EventCalendar\Providers;

use Illuminate\Support\AggregateServiceProvider;

class PackageServiceProvider extends AggregateServiceProvider
{   
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        RouteServiceProvider::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        #dd(public_path('vendor/event-calendar'));
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'event');
        $this->publishes([
            __DIR__.'/../../public/assets' => public_path('vendor/event-calendar'),
        ], 'public');
    }
}
