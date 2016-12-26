<?php namespace App\Http\Controllers;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return HomeController
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }
}
