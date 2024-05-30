<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Pets;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(Request $request){
        return view('homepage');
    }

    public function learnMore(){
        return view('learnMore');
    }

}
