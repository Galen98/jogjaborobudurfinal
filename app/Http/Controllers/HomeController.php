<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\blog;
use App\Models\travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $travel = travel::orderBy('created_at','DESC')->paginate(3);
        $blog=blog::orderBy('created_at','DESC')->paginate(3);
        return view('admin', compact('blog','travel'));
    }

    
}
