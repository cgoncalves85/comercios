<?php

namespace App\Http\Controllers;

use App\Store;
use App\Images;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $ImgLocales = Store::all();

        $cantL = count($ImgLocales);

        return view('home', [
            'ImgLocales' => $ImgLocales,
            'cantL' => $cantL,
        ]);
    }
}
