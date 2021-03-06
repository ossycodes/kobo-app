<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Rent\Jobs\GetOpeningRentsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowOpeningPagesFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['openingRents'] = $this->run(GetOpeningRentsJob::class, ['companyId' => $request->user()->getUserCompany()->id]);
        return $this->run(new RespondWithViewJob('client::opening-pages.index', $data));
    }
}
