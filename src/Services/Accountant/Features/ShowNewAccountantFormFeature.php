<?php

namespace App\Services\Accountant\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowNewAccountantFormFeature extends Feature
{
    public function handle(Request $request)
    {
		return $this->run(new RespondWithViewJob('path.to.accountant.form'));
    }
}
