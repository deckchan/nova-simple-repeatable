<?php

namespace Outl1ne\NovaSimpleRepeatable;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Outl1ne\NovaTranslationsLoader\LoadsNovaTranslations;

class SimpleRepeatableServiceProvider extends ServiceProvider
{
    use LoadsNovaTranslations;

    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('simple-repeatable', __DIR__ . '/../dist/js/entry.js');
        });

        $this->loadTranslations(__DIR__ . '/../resources/lang', 'nova-simple-repeatable-field', true);
    }

    public function register()
    {
        //
    }
}
