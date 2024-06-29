<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TallStackUi\Facades\TallStackUi;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        TallStackUi::personalize()
            ->button()
            ->block('wrapper.sizes.md', 'text-sm px-4 py-2')
            ->block('wrapper.sizes.sm', 'text-xs px-2 py-1')
            ->block('wrapper.sizes.lg', 'text-base px-4 py-2.5');
    }
}
