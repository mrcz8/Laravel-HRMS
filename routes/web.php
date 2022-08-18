<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangepasswordController;




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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware'=>'auth'],function(){
    // Admin
            Route::group(['middleware'=>'rank:admin'],function(){
                Route::resource('/staffs', StaffController::class);
                Route::get('/resetpassword/{id}',[StaffController::class,'resetpassword'])->name('staffs.resetpassword');
                
                Route::resource('/agents', AgentController::class);
                Route::get('/updatestatus/{id}',[AgentController::class,'updatestatus'])->name('agents.updatestatus');

                Route::resource('/accounts', AccountController::class);
                Route::post('/addcontracts' ,[AccountController::class, 'addcontracts'])->name('contracts.addcontracts');
                Route::get('/updatecontracts/{id}',[AccountController::class, 'updatecontracts'])->name('contracts.updatecontracts');
                Route::get('/deletedestroy/{id}', [AccountController::class,'deletedestroy'])->name('contract.deletedestroy');
                
                Route::get('/change_password/{id}', [UserController::class, 'update'])->name('change_password.update');

                Route::post('/fileimport', [ImportController::class, 'store'])->name('admins.store');
                Route::get('/fileexport', [ImportController::class, 'export'])->name('admins.export');

                Route::resource('/active', ActiveController::class);
                Route::get('/inactive', [ActiveController::class, 'inactive'])->name('emp.inactive');

                Route::get('/change_password', [ChangepasswordController::class, 'index'])->name('change_password.index');
                Route::get('/updatepassword/{id}', [ChangepasswordController::class, 'updatepassword'])->name('staffs.updatepassword'); 
            });

    // Staff
            Route::group(['middleware'=>'rank:staffs'],function(){
                Route::resource('/staffs', StaffController::class);
                Route::get('/resetpassword/{id}',[StaffController::class,'resetpassword'])->name('staffs.resetpassword');
                
                Route::resource('/agents', AgentController::class);
                Route::get('/updatestatus/{id}',[AgentController::class,'updatestatus'])->name('agents.updatestatus');

                Route::resource('/accounts', AccountController::class);
                Route::post('/addcontracts' ,[AccountController::class, 'addcontracts'])->name('contracts.addcontracts');
                Route::get('/updatecontracts/{id}',[AccountController::class, 'updatecontracts'])->name('contracts.updatecontracts');
                Route::get('/deletedestroy/{id}', [AccountController::class,'deletedestroy'])->name('contract.deletedestroy');
                
                Route::get('/change_password/{id}', [UserController::class, 'update'])->name('change_password.update');

                Route::post('/fileimport', [ImportController::class, 'store'])->name('admins.store');
                Route::get('/fileexport', [ImportController::class, 'export'])->name('admins.export');

                Route::resource('/active', ActiveController::class);
                Route::get('/inactive', [ActiveController::class, 'inactive'])->name('emp.inactive');

                Route::get('/change_password', [ChangepasswordController::class, 'index'])->name('change_password.index');
                Route::get('/updatepassword/{id}', [ChangepasswordController::class, 'updatepassword'])->name('staffs.updatepassword');


            });
    
        });

Route::get('logout', function () {
    Auth::logout();
    session()->invalidate();
    return redirect('/');
})->name('logout');
        




// Route::get('/test', function () {
//     $password = Hash::make('admin');
//     echo($password);
// });