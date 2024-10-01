<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\client;
use App\Models\Consult;
use App\Models\Email;
use App\Models\News;
use App\Models\Product;
use App\Models\Service;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = client::all();
        $users = User::all();
        $products = Product::all();
        $emails = Email::all();
        $consults = Consult::all();
        $services = Service::all();
        return view('dashboard', ['clients' => $clients, 'users' => $users, 'products' => $products, 'emails' => $emails , 'consults' => $consults , 'services' => $services]);
    }
}
