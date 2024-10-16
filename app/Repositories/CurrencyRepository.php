<?php

namespace App\Repositories;

use App\Contracts\CurrencyRepositoryInterface;
use App\Models\Currency;
use App\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{
    public function __construct(Currency $currency) {
        parent::__construct($currency);
    }

    public function getAllCurrencies()
    {
        return $this->getAll();
    }
}
