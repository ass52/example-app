<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**Users**/
Route::delete("users/destroy", [UsersController::class,"destroy"])->name("users.delete");
Route::resource("users", UsersController::class)->parameters(["users" => "users"]);
/**Users Apllication**/
Route::delete("users/{admiko_users_id}/apllication/destroy", [Users\ApllicationController::class,"destroy"])->name("apllication.delete");
Route::resource("users/{admiko_users_id}/apllication", Users\ApllicationController::class)->parameters(["apllication" => "apllication"]);
/**Application**/
Route::delete("application/destroy", [ApplicationController::class,"destroy"])->name("application.delete");
Route::resource("application", ApplicationController::class)->parameters(["application" => "application"]);
/**Application New**/
Route::delete("application/{admiko_application_id}/new/destroy", [Application\NewController::class,"destroy"])->name("new.delete");
Route::resource("application/{admiko_application_id}/new", Application\NewController::class)->parameters(["new" => "new"]);
/**Application Add**/
Route::delete("application/{admiko_application_id}/add/destroy", [Application\AddController::class,"destroy"])->name("add.delete");
Route::resource("application/{admiko_application_id}/add", Application\AddController::class)->parameters(["add" => "add"]);
/**Application New1**/
Route::delete("application/{admiko_application_id}/new1/destroy", [Application\New1Controller::class,"destroy"])->name("new1.delete");
Route::resource("application/{admiko_application_id}/new1", Application\New1Controller::class)->parameters(["new1" => "new1"]);
/**AdInterstaitals**/
Route::delete("ad_interstaitals/destroy", [AdInterstaitalsController::class,"destroy"])->name("ad_interstaitals.delete");
Route::resource("ad_interstaitals", AdInterstaitalsController::class)->parameters(["ad_interstaitals" => "ad_interstaitals"]);
/**AdInterstaitals Add1**/
Route::delete("ad_interstaitals/{admiko_ad_interstaitals_id}/add1/destroy", [AdInterstaitals\Add1Controller::class,"destroy"])->name("add1.delete");
Route::resource("ad_interstaitals/{admiko_ad_interstaitals_id}/add1", AdInterstaitals\Add1Controller::class)->parameters(["add1" => "add1"]);
/**AddBanners**/
Route::delete("add_banners/destroy", [AddBannersController::class,"destroy"])->name("add_banners.delete");
Route::resource("add_banners", AddBannersController::class)->parameters(["add_banners" => "add_banners"]);
/**AdRewards**/
Route::delete("ad_rewards/destroy", [AdRewardsController::class,"destroy"])->name("ad_rewards.delete");
Route::resource("ad_rewards", AdRewardsController::class)->parameters(["ad_rewards" => "ad_rewards"]);
