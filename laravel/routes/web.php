<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// /about routing(GET)
// Route::get('/about', function () {
//     return view('about');
// });
// About page
Route::get('/about', [HomeController::class, 'about']);
// Search
Route::get('search', [HomeController::class, 'search']);
// item iD
Route::get('/item/{id}', [HomeController::class, 'show']);
// dp/item
Route::get('dp/{id}', HomeController::class, 'show');
// /item/xx access routing(GET)
// Route::get('/item/{id}', function ($id) {
//     $message = "Product ID is {$id}";
//     return $message;
// });

// Amazon routing(GET)
// Route::get('/dp/{id}', function ($id) {
//     $message = "Product ID is {$id}";
//     return $message;
// });

// Google routing(GET)
// Route::get('/search', function (Request $request) {
//     // $message = "Search word is {$request->q}";
//     // Array data
//     $data = [
//         'keyword' => $request->q
//     ];
//     // View data
//     return view('search', $data);
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';