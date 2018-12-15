<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/14/2018
 * Time: 11:12 PM
 */

namespace Koboaccountant\Repositories\Transactions;



use Koboaccountant\Contracts\TransactionInterface;
use Koboaccountant\Repositories\BaseRepository;

class BankTransactionRepository extends BaseRepository implements TransactionInterface
{

    public function create(array $data)
    {
        $transaction = $this->model;
        $transaction->id = $this->generateUuid();
        $transaction->user_id = $this->getAuthUserId();
        $transaction->description = "A ". $data['class'] . " transaction happened." ;
        $transaction->class = $data['class'];
        $transaction->bank_details_id = $data ['bank_details_id'];
        $transaction->class_id = $data['class_id'];
        $transaction->amount = $data['amount'];
        $transaction->save();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}