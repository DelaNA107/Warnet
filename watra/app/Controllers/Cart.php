<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function index()
    {
        echo view('part/header');
        echo view('part/topbar');
        echo view('part/navbar');
        echo view('cart');
        echo view('part/footer');
    }
}
