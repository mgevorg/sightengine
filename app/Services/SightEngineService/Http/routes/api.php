<?php
namespace App\Services\SightEngineService\Http\routes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\SightEngineService\Http\Controllers\MainController;

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

// Route::get("/test", function() {
//     dd("alive");
// });

 
Route::get('/test', [MainController::class, 'test']);
