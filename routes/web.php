<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/index', [UserController::class, 'index'])->name('index');

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'postLogin'])->name('login');

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'postRegister'])->name(
    'register'
);

Route::get('/payment', [UserController::class, 'payment'])->name('payment');
Route::post('/payment', [UserController::class, 'postPayment'])->name('pay');

Route::get('/payment/callback', [
    UserController::class,
    'handleGatewayCallback',
]);

Route::get('/confirm_invoice/{payment_id}', [
    UserController::class,
    'invoice',
])->name('invoice');

Route::get('/payment/callback', [
    UserController::class,
    'handleGatewayCallback',
])->name('generate');
