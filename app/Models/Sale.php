<?php

namespace Koboaccountant\Models;

use App\Data\SaleItem;
use App\Data\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sales_date',
        'name',
        'quantity',
        'amount',
	    'delivery_cost',
    ];
    
    protected $dates = ['deleted_at'];

    public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('Koboaccountant\Models\Company');
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function staff()
    {
        return $this->belongsTo('Koboaccountant\Models\Staff');
    }

    public function customers()
    {
        return $this->belongsToMany('Koboaccountant\Models\Customer');
    }

    public function transaction()
    {
    	return $this->hasOne(Transaction::class);
    }
}
