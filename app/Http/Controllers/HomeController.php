<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;
use App\Seller;
use App\Article;
use App\User;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $user=User::find($id);
        $user->onlineStatus=1;
        $user->save();
        $buyers = Buyer::orderBy('id', 'desc')->paginate(10);
        $sellers = Seller::orderBy('id', 'desc')->paginate(10);
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('home')
        ->withBuyers($buyers)
        ->withSellers($sellers)
        ->withArticles($articles)
        ->withId($id);
    }
}
