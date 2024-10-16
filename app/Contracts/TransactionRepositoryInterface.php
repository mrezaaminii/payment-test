<?php

namespace App\Contracts;

interface TransactionRepositoryInterface
{
    public function storeTransaction(object $data);
    public function updateTransaction(string $authority, object $data);
}
