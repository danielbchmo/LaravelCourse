<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpleadoController;

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

Route::get('/', function () {
    return view('auth.login');
}); 

//"." maining that you will access to all the files inside of employee
// Route::get('/employee', function () {
//     return view('employee.index');
// }); 

//       when the user access to url        class inside of the controller file
// Route::get('/employee/create',[EmpleadoController::class,'create']);
//                              Controller file             class' name

//Access all the routes
Route::resource('employee', EmpleadoController::class);
Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});