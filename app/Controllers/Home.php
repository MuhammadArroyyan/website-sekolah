<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Panggil View Landing Page
        return view('landing_page');
    }
}