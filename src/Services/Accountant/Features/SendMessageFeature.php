<?php

namespace App\Services\Accountant\Features;

use App\Domains\Chat\Jobs\SendMessageJob;
use App\Domains\Http\Jobs\RespondWithJsonErrorJob;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SendMessageFeature extends Feature
{
    public function handle(Request $request)
    {
    	// Data should contain message and the conversation Id
		$sent = $this->run(SendMessageJob::class, ['senderId' => Auth::user()->id, 'data' => $request->all()]);
		if ($sent) {
			return $this->run(new RespondWithJsonJob(['status' => 'success']));
		}

	    return $this->run(new RespondWithJsonErrorJob(['status' => 'error']));
    }
}
