<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function(Request $request) {
    return 'Authenticated';
});


// Api route for sending email
Route::post('/send', [EmailController::class, 'sendEmail']);

// Route::post('/list', [EmailController::class, 'sendEmail']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
