<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredDetailsController extends Controller
{
    public function read()
    {
        $user=User::all();
        
    }
}
