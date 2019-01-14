<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buyer;
use App\Seller;
use App\Article;

class PublicPageController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest');
  }

  public function test()
  {
      return view('test');
  }
  public function welcome()
  {
      $buyers = Buyer::orderBy('id', 'desc')->paginate(10);
      $sellers = Seller::orderBy('id', 'desc')->paginate(10);
      $articles = Article::orderBy('id', 'desc')->paginate(10);
      return view('welcome')
      ->withBuyers($buyers)
      ->withSellers($sellers)
      ->withArticles($articles);
  }

  public function SellView($id)
  {
    //fetch from the DB based om slug
    $seller = Seller::where('id', '=', $id)->first();

    //return the view and pass the post object
    return view('pages.visitor.sell')->withSeller($seller);
  }

  public function BuyView($id)
  {
    //fetch from the DB based om slug
    $buyer = Buyer::where('id', '=', $id)->first();

    //return the view and pass the post object
    return view('pages.visitor.buy')->withBuyer($buyer);
  }

}
