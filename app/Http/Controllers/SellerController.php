<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\User;
use Image;
use Session;
use Storage;
use Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //create a variable and store all the blog posts in it from the database
      $sellers = Seller::orderBy('id', 'desc')->paginate(10);
      //return a view and pass in the above variable
      return view('pages.seller.index')->withSellers($sellers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opacity_value = DB::table('site_info')->where('attr_name', 'form_opacity')->get()->toArray();
        return view('pages.seller.create')->with('opacity', $opacity_value[0]->attr_value);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate the data
      $this->validate($request, array(
          'seller_featured_image'           => 'mimes:jpeg,jpg,png,gif|required|max:20000', // max 20000kb/2MB
          // 'seller_commission_percentage'    => 'required|max:255',
          'seller_item_code'                => 'required|string|max:255|unique:sellers',
          'seller_pro_weight'                => '',
          'seller_category'                 => 'required',
          'seller_org_price'                => 'required|integer',
          'seller_sale_price'               => 'required|integer|max:'.$request->seller_org_price,
          'seller_website'                  => 'required|max:255',
          'seller_pro_title'                => 'required|min:5|max:255',
          'seller_pro_description'          => 'required',
          'seller_location'                 => 'required',
          'seller_info_from'                => '',
          'seller_info_price'               => 'nullable|integer',
          'seller_info_description'         => 'nullable|min:5|max:255',
         ));
        // store in the database
          $seller = new Seller;

          $seller->user()->associate($request->user());
          // $seller->seller_commission_percentage = $request->seller_commission_percentage;
          $seller->seller_item_code             = $request->seller_item_code;
          $seller->seller_pro_weight            = $request->seller_pro_weight;
          $seller->seller_category              = $request->seller_category;
          $seller->seller_org_price             = $request->seller_org_price;
          $seller->seller_sale_price            = $request->seller_sale_price;
          $seller->seller_website               = $request->seller_website;
          $seller->seller_pro_title             = $request->seller_pro_title;
          $seller->seller_pro_description       = $request->seller_pro_description;
          $seller->seller_location              = $request->seller_location;
          $seller->seller_info_from             = $request->seller_info_from;
          $seller->seller_info_price            = $request->seller_info_price;
          $seller->seller_info_description      = $request->seller_info_description;

          //Save our Image
          if ($request->hasFile('seller_featured_image')) {
          $image = $request->file('seller_featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('uploads/seller/' . $filename);
          Image::make($image)->resize(280,320)->save($location);

          $seller->seller_featured_image = $filename;
          }

          $seller->save();


          Session::flash('success', 'The post was successfully published!');
          // redirect to another page
           return redirect()->route('seller.show', $seller->id);
          // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user_id = Auth::User()->id;
      $users = User::all();
      $seller = Seller::find($id);
      $post_user = $seller->user_id;
      if($user_id == $post_user)
      {
        $edit_value = "true";
      }
      else
      {
        $edit_value = "false";
      }
      return view('pages.seller.show', array('user' => Auth::User()), array('edit_val' =>  $edit_value))
      ->withSeller($seller)->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $seller = Seller::find($id);
      if(auth()->user()->id !== $seller->user_id) {
        return redirect('home')->with('error', 'You are not authorized');
      }
      return view('pages.seller.edit')->withSeller($seller);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      //validate the data before use it
      $this->validate($request, array(
        'seller_featured_image'           => 'sometimes|image',
        // 'seller_commission_percentage'    => 'required|max:255',
        'seller_item_code'                => 'required',
        'seller_pro_weight'                => '',
        'seller_category'                 => 'required',
        'seller_org_price'                => 'required|integer',
        'seller_sale_price'               => 'required|integer|max:'.$request->seller_org_price,
        'seller_website'                  => 'required|max:255',
        'seller_pro_title'                => 'required|min:5|max:255',
        'seller_pro_description'          => 'required|min:5|max:255',
        'seller_location'                 => 'required',
        'seller_info_from'                => '',
        'seller_info_price'               => 'nullable|integer',
        'seller_info_description'         => 'nullable|min:5|max:255',
      ));


      // save data to the database.
      $seller = Seller::find($id);

      // $seller->seller_commission_percentage   = $request->input('seller_commission_percentage');
      $seller->seller_item_code               = $request->input('seller_item_code');
      $seller->seller_pro_weight              = $request->input('seller_pro_weight');
      $seller->seller_category                = $request->input('seller_category');
      $seller->seller_org_price               = $request->input('seller_org_price');
      $seller->seller_sale_price              = $request->input('seller_sale_price');
      $seller->seller_website                 = $request->input('seller_website');
      $seller->seller_pro_title               = $request->input('seller_pro_title');
      $seller->seller_pro_description         = $request->input('seller_pro_description');
      $seller->seller_location                = $request->input('seller_location');
      $seller->seller_info_from               = $request->input('seller_info_from');
      $seller->seller_info_price              = $request->input('seller_info_price');
      $seller->seller_info_description        = $request->input('seller_info_description');
      $seller->seller_pro_title               = $request->input('seller_pro_title');
      $seller->seller_pro_description         = $request->input('seller_pro_description');
      $seller->seller_location                = $request->input('seller_location');



      if ($request->hasFile('seller_featured_image')) {
        //add new photo
        $image = $request->file('seller_featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/seller/' . $filename);
        Image::make($image)->save($location);
        $oldfilename = $seller->seller_featured_image;
        //update the database
        $seller->seller_featured_image = $filename;
        //delete the olf photo
        Storage::delete($oldfilename);
      }

      $seller->save();

      //set flash data with success message
      Session::flash('success', 'This post was successfully changed.');
      //redirect with flash data to posts.show
      return redirect()->route('seller.show', $seller->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $seller = Seller::find($id);
      Storage::delete($seller->seller_featured_image);

      $seller->delete();

      Session::flash('success', 'The seller post was sucessfully deleted.');

      return redirect()->route('seller.index');
    }
}
