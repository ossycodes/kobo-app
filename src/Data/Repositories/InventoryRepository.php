<?php 

namespace App\Data\Repositories;

use Koboaccountant\Models\Inventory;

class InventoryRepository extends Repository
{
    public function __construct(Inventory $model)
    {
        parent::__construct($model);
    }
}