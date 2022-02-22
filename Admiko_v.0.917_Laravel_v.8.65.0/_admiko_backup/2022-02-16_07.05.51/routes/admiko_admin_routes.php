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
/**Import1**/
Route::delete("import1/destroy", [Import1Controller::class,"destroy"])->name("import1.delete");
Route::resource("import1", Import1Controller::class)->parameters(["import1" => "import1"]);
