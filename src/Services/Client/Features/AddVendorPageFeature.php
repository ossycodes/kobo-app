<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddVendorPageFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(new RespondWithViewJob('client::vendor.add-vendor'));
    }
}
