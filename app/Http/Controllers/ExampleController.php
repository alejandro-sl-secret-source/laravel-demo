<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $name = 'John Doe';
        return view('example.index', [
            'name' => $name,
        ]);
    }
}
