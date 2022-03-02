<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function display()
    {
    return view('student',['name1'=>'bharath','name2'=>'krishna','name3'=>'kiran']);
    }
}
