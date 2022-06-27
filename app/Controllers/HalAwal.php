<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HalAwal extends BaseController
{
    public function index()
    {
        //load view login form
        return view('hal_awal');
    }
}