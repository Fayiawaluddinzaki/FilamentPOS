<?php

use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user',function ()
{
    $user = User::orderBy('id')->get();
        return UserResource::collection($user);
});

Route::get('/product', function ()
{
   $produk = Product::get();
//   OrderBy('id','DESC')->get();
   return ProductResource::collection($produk);
//    dd($produk);
});
