<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class Pembobotan extends BaseController
{

    public function index()
    {
        return view('pembobotan/index');
    }


    public function hasil()
    {
        return view('pembobotan/hasil');
    }


    public function cetak()
    {
        return view('pembobotan/cetak');
    }

    function print()
    {
        return view('pembobotan/print');
    }
}
