<?php

namespace App\Repositories;

use App\Contracts\TransactionRepositoryInterface;
use App\Models\Transaction;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{

    public function __construct(Transaction $transaction)
    {
        parent::__construct($transaction);
    }

    public function storeTransaction(object $data)
    {
        return $this->storeData(['authority' => $data->Authority, 'description' => $data->Description]);
    }

    public function updateTransaction(string $authority, object $data)
    {
        return $this->findBy('authority', $authority)->update(['success' => $data->Success, 'description' => $data->Description, 'reference' => $data->Reference, 'order_number' => $data->OrderNo, 'amount' => $data->Amount]);
    }
}
