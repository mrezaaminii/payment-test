<?php

namespace App\Providers;

use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\CurrencyRepository;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
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
        view()->composer(['payment.credentials'], function ($view) {
            $countryRepo = app(CountryRepository::class);
            $cityRepo = app(CityRepository::class);
            $currencyRepo = app(CurrencyRepository::class);
            $view->with([
                    'countries' => $countryRepo->getAllCountries(),
                    'cities' => $cityRepo->getAllCities(),
                    'currencies' => $currencyRepo->getAllCurrencies()
                ]
            );
        });
    }
}
