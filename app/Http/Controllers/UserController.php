<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use Session;

class UserController extends Controller
{
  public function showProfile()
  {
    return view('pages.profile.index', array('user' => Auth::User()) );
  }

  public function updatePic(Request $request)
  {
      // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

        // save data to the database.
    		$user = Auth::user();
    		$user->avatar = $filename;

    		$user->save();
      }
      //Rizwan Changes Start Here
      if($request->hasFile('photo_id')){
    		$photo_id = $request->file('photo_id');
    		$filename = time() . '.' . $photo_id->getClientOriginalExtension();
    		Image::make($photo_id)->resize(300, 300)->save( public_path('/uploads/photoId/' . $filename ) );

        // save data to the database.
    		$user = Auth::user();
    		$user->photo_id = $filename;

    		$user->save();
      }
      
      
      if($request->has('webcam_image')){
        $png_url = time().".png";
        $path = public_path('/uploads/webcam/').$png_url;

        Image::make(file_get_contents($request->webcam_image))->save($path);   

    	   // save data to the database.
    		$user = Auth::user();
    		$user->webcam_image = $png_url;
    		$user->save();
      }
      //Rizwan Changes End Here
      
      Session::flash('success', 'Profile Image Updated');
    	return redirect()->route('profile')->with(array('user' => Auth::User()));
    }

    public function updateUser(Request $request)
    {
      $this->validate($request, [
        // 'location' => 'required|string|max:255',
        // 'phone_no' => 'required|numeric',
        // 'paypal_email' => 'required|string|email|max:255',
          ]);

      $user = Auth::user();

      $user->location          = $request->input('location');
      $user->phone_no          = $request->input('phone_no');
      $user->paypal_email      = $request->input('paypal_email');

      $user->save();
      Session::flash('success', 'Profile Updated');
      return redirect()->route('profile')->with(array('user' => Auth::User()));
    }
    //Waqas Changes
    public function emailVerification()
    {
        return view('pages.profile.email-verification');
    }
}
