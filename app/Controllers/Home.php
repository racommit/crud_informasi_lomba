<?php

namespace App\Controllers;


class Home extends BaseController
{

    public function index(): string
    {
        return view('home');
    }
    
    public function forbidden(): string
    {
        return view('404');
    }
   
}
