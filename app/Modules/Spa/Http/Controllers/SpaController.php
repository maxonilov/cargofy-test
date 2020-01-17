<?php

namespace App\Modules\Spa\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SpaController extends Controller
{
    public function __invoke()
    {
        return view('spa::app');
    }
}
