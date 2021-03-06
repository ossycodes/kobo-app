<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RevenueCategory extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    
    protected $dates = ['deleted_at'];
}
