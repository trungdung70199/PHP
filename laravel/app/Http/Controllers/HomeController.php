<?php

// Javaでいう package
namespace App\Http\Controllers;

// Javaでいう import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about() {
        return view('about');
    }

    public function search(Request $request) {
        $data = [
            'keyword' => $request->q
        ];
        return view('search', $data);
    }
}