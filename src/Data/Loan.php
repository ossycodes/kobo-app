<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $incrementing = false;
    protected $fillable = ['description', 'amount', 'amount_paid','interest', 'period', 'term', 'payment_interval', 'start_date'];

    public function source()
    {
        return $this->hasOne(LoanSource::class, 'loan_source_id');
    }

    public function payments()
    {
        return $this->hasMany('Koboaccountant\Models\LoanPayment', 'loan_id');
    }
}
