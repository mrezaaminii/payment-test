<?php

namespace App\Repositories;

use App\Contracts\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    public function __construct(Country $country) {
        parent::__construct($country);
    }

    public function getAllCountries()
    {
        return $this->getAll();
    }
}
