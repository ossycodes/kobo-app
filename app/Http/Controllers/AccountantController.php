<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function index()
    {
        return view('account-dashboard');
    }
}
