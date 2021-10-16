<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //最新記事9件取得
      $steps = Step::with('category')->get()->take(9)->sortByDesc('created_at');
      
        return view('index', compact('steps'));
    }
}
