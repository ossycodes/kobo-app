<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class AccountantClient extends Model
{
    protected $table = 'accountant_clients';

    protected $fillable = [
    	'id', 'client_id', 'accountant_id',
    ];

    public $incrementing = false;

    public function client()
    {
    	return $this->hasOne('App\Models\Client');
    }

    public function accountant()
    {
    	return $this->hasOne('App\Models\Accountant');
    }
}
