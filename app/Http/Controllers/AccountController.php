<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // index
    public function index(){
        return view('reports', [
            'accounts' => Account::latest()->paginate(30)
        ]);
    }
}
