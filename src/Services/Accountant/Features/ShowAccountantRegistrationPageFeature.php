<?php

namespace App\Services\Accountant\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAccountantRegistrationPageFeature extends Feature
{
    public function handle(Request $request)
    {
	return $this->run(new RespondWithViewJob('accountant::auth.register'));
    }
}
