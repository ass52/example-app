<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**Users**/
Route::delete("users/destroy", [UsersController::class,"destroy"])->name("users.delete");
Route::resource("users", UsersController::class)->parameters(["users" => "users"]);
/**Users Import**/
Route::delete("users/{admiko_users_id}/import/destroy", [Users\ImportController::class,"destroy"])->name("import.delete");
Route::resource("users/{admiko_users_id}/import", Users\ImportController::class)->parameters(["import" => "import"]);
