<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Sales\SalesRepository;

class SalesController extends Controller
{
	function __construct()
	{
		$this->salesRepo = new SalesRepository;
	}

    public function create(Request $request)
    {
    	//Validations
    	$this->salesRepo->create($request->all());
    }
}
