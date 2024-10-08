<?php

namespace App\Providers;

use App\Models\Chorister;
use App\Models\Group;
use App\Observers\ChoristerObserver;
use App\Observers\GroupObserver;
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
        Chorister::observe(ChoristerObserver::class);
        Group::observe(GroupObserver::class);

        TallStackUi::personalize('card')
            // ->block('header.text', 'text-gray-800 font-semibold')
            // ->block('body', 'text-gray-900 dark:text-dark-300 grow rounded-b-xl px-4 py-5');
            ->block('header.text')
            ->replace('text-secondary-700', 'text-gray-800')
            ->block('body')
            ->replace('text-secondary-700', 'text-gray-900');
        TallStackUi::personalize('button')
            ->block('wrapper.sizes.md', 'text-sm px-4 py-2')
            ->block('wrapper.sizes.sm', 'text-xs px-2 py-1')
            ->block('wrapper.sizes.lg', 'text-base px-4 py-2.5');
        TallStackUi::personalize('avatar')
            ->block('wrapper.class', 'rounded');
            // ->remove('overflow-hidden');
    }
}
