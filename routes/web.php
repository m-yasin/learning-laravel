<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function(){
    return view('home');
});
Route::get('/', function () {
   // return view('welcome');
     $users = DB::select('select * from users');
    dd($users);
//    $user = DB::insert('Insert into users(name, email,password ) values(?,?,?)', ['jack','jackdoe@gmail.com','jack']);
//    dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
