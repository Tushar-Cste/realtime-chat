<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest'])->group(function () {

  Route::get('/', 'PublicPageController@welcome')->name('welcome');
  // Visitors
  Route::get('sell/{id}', 'PublicPageController@SellView')->name('sell');
  Route::get('buy/{id}', 'PublicPageController@BuyView')->name('buy');
  //Waqas Changes
  Route::get('/email-verification', 'UserController@emailVerification')->name('emailVerification');
});
//Route::get('/deploy-923457286', 'Controller@deploy')->name('deploy');
// Default
Auth::routes(['verify' => true]);
Route::middleware(['auth'])->group(function () {
  //home
  Route::get('/home', 'HomeController@index')->name('home');
  // Admin
  Route::get('admin', 'PageController@viewAdmin')->name('admin');
  //Waqas Changes
  Route::get('findmenu_options', 'PageController@findmenu_options')->name('findmenu_options');
  Route::post('add_user_menu', 'PageController@add_user_menu')->name('add_user_menu');
  Route::get('brandupdate', 'PageController@brandupdate')->name('brandupdate');
  Route::post('brandupdate', 'PageController@brandupdate')->name('brandupdate');
  //Admin dropdown
  Route::get('wallet', 'PageController@wallet')->name('wallet');
  Route::get('UserAccess', 'PageController@userAccess')->name('UserAccess');
  Route::get('accountant', 'PageController@accountant')->name('accountant');
  Route::get('membership', 'PageController@membership')->name('membership');
  Route::get('userMembershipdetails', 'PageController@userMembershipdetails')->name('userMembershipdetails');

  Route::get('CategorySetup', 'PageController@categorySetup')->name('categorySetup');
    Route::get('CategorySetup2', 'PageController@test')->name('test');
  Route::get('QueryScreen', 'PageController@queryscreen')->name('queryscreen');
  Route::post('TakeQuery', 'PageController@takeQuery')->name('takequery');
  Route::post('SaveQuery', 'PageController@saveQuery')->name('saveQuery');
  Route::post('DeleteQuery', 'PageController@deleteQuery')->name('deleteQuery');
  Route::post('SavePost', 'PageController@savePost')->name('savePost');
  Route::post('credit', 'PageController@credit')->name('credit');
  Route::post('transfer', 'PageController@transfer')->name('transfer');
  Route::post('getIdNameList', 'PageController@getIdNameList')->name('getIdNameList');
  Route::post('OpacityUpdate', 'PageController@opacityUpdate')->name('opacityUpdate');
  Route::post('getEmailBasedData', 'PageController@getEmailBasedData')->name('getEmailBasedData');
  Route::post('getTransByDateRange', 'PageController@getTransByDateRange')->name('getTransByDateRange');
  Route::post('moveToExcel', 'PageController@moveToExcel')->name('moveToExcel');
  
  // Admin
  Route::get('admin', 'PageController@viewAdmin')->name('admin');
  Route::get('findmenu_options', 'PageController@findmenu_options')->name('findmenu_options');
  Route::post('add_user_menu', 'PageController@add_user_menu')->name('add_user_menu');
  Route::get('brandupdate', 'PageController@brandupdate')->name('brandupdate');
  Route::post('brandupdate', 'PageController@brandupdate')->name('brandupdate');
//Babar works 
  Route::get('/booking', 'BookingController@booking')->name('booking');
  // User Profile
  Route::get('/profile', 'UserController@showProfile')->name('profile');
  Route::post('/profile', 'UserController@updatePic')->name('updatePic');
  Route::post('/updateUser', 'UserController@updateUser')->name('updateUser');

  Route::get('/upcoming_services', 'PageController@upcomingServices')->name('upcomingServices');
  

  //My Posts
  Route::get('/my_posts', 'PageController@myPosts')->name('myPosts');
  Route::get('saved_posts', 'PageController@getSavePost')->name('getSavePost');
  //Coupon
  Route::get('/coupon', 'CouponController@coupons')->name('coupons'); 
  Route::get('/coupon/action', 'CouponController@action')->name('coupon.action');
  Route::get('/coupon/create', 'CouponController@create')->name('coupon.create');
  Route::post('/coupon/create', 'CouponController@store')->name('coupon.store'); 
  Route::get('/coupon/{id}/edit', 'CouponController@editCoupon')->name('coupon.edit'); 
  Route::post('/coupon/{id}/update', 'CouponController@updateCoupon')->name('coupon.update');  
  Route::get('/coupon/{id}/delete', 'CouponController@deleteCoupon')->name('coupon.delete');


  // All Order details
  //Show All Orders
  Route::get('/order', 'OrderController@index')->name('order');
  //Buyer order from single buyer post
  Route::PUT('/buyerOrder/{id}', 'OrderController@buyerOrder')->name('buyerOrder');
  Route::get('/buyerShow/{id}', 'OrderController@buyerShow')->name('buyerShow');
  Route::get('/buyerSingle/{id}', 'OrderController@buyerSingle')->name('buyerSingle');
  Route::PUT('/buyerStatus/{id}', 'OrderController@buyerStatus')->name('buyerStatus');
  //Seller order from single seller post
  Route::PUT('/sellerOrder/{id}', 'OrderController@sellerOrder')->name('sellerOrder');
  // Route::get('/sellerShow/{id}', 'OrderController@sellerShow')->name('sellerShow');
  Route::get('/sellerSingle/{id}', 'OrderController@sellerSingle')->name('sellerSingle');
  Route::PUT('/sellerStatus/{id}', 'OrderController@sellerStatus')->name('sellerStatus');
  //Posts (buyer, seller, article)
  Route::resource('/buyer', 'BuyerController');
  Route::resource('/seller', 'SellerController');
  Route::resource('/article', 'ArticleController');
  //email
  Route::resource('/email', 'EmailController');


});
//Waqas Changes
Route::middleware(['auth'])->group(function () {
    Route::post('user-access-ajax', 'PageController@userAccessAjax')->name('UserAccessAjax');
    Route::post('edit-or-create-new-user', 'PageController@saveExistingUser')->name('saveExistingUser');
    Route::post('create-user/{flag}', 'PageController@CreateUserWith')->name('CreateUserWith');
    Route::post('delete-user', 'PageController@deleteProfile')->name('deleteProfile');

});

//Routes for advertisement

Route::get('/advertisement', 'AdvertisementController@index')->name('AdvertisementPage');

Route::post('/AdvertisementAction', 'AdvertisementController@action')->name('AdvertisementAction');
Route::get('/advertisement/show', 'AdvertisementController@viewAds')->name('AdvertisementShow');
Route::post('deleteAdd', 'AdvertisementController@deleteAdd')->name('deleteAdd');
Route::post('getAdsData', 'AdvertisementController@getAdsData')->name('getAdsData');
Route::post('addProfession', 'PageController@addProfession')->name('addProfession');
Route::post('getProfession', 'PageController@getProfession')->name('getProfession');
Route::post('updateProfession', 'PageController@updateProfession')->name('updateProfession');
Route::post('deleteProfession', 'PageController@deleteProfession')->name('deleteProfession');
Route::post('getProfessionOfType', 'PageController@getProfessionOfType')->name('getProfessionOfType');

Route::get('foo', function () {
  return 'Hello World';
});


//route for chat ............
Route::get('/chatdashboard', 'ChatDashboardController@index')->name('chatdashboard');
Route::get('/privateChat/{chatRoomId}', 'PrivateChatController@rtnChatBox')->name('privateChat');
Route::post('/send/{id}', 'PrivateChatController@store');
Route::post('/geturl', 'PrivateChatController@geturl');
Route::post('/timeformate', 'PrivateChatController@timeformate');
Route::post('/setuserlocalutc', 'PrivateChatController@setuserlocalutc');
Route::get('/getlogedinusertime', 'PrivateChatController@getlogedinusertime')->name('getlogedinusertime');

Route::post('/getOldMessage', 'ChatController@getOldMessage');
Route::post('/chatSpam/{id}', 'ChatController@spam');
Route::post('/chatReport/{id}', 'ChatController@report');
Route::get('/search', 'searchController@search');
Route::get('/defaullevelsearch', 'searchController@defaullevelsearch')->name('defaullevelsearch');
Route::get('/levelsearch', 'searchController@levelsearch')->name('levelsearch');
Route::get('/unreadsearch', 'searchController@unreadsearch')->name('unreadsearch');
Route::get('/indeviduallevelsearch', 'searchController@indeviduallevelsearch')->name('indeviduallevelsearch');

Route::post('/setonline', 'ChatController@setonline');
Route::post('/setoffline', 'ChatController@setoffline');
Route::post('/getallOnlineUser', 'ChatController@getallOnlineUser');
Route::post('/readwrite', 'ChatController@readwrite');

Route::get('/levelset', 'LevelController@index')->name('levelset');
Route::get('/getOldLevel', 'LevelController@getOldLevel');
Route::post('/addcustomlevel', 'LevelController@custom');
Route::get('/leveldel/{id}','LevelController@delete')->name('leveldel');

Route::get('/gmtime', 'PrivateChatController@test');
Route::get('/testtt','searchController@test');