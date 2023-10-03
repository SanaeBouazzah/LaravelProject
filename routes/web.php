<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/result', function () {
  // $users = DB::insert('insert into users (name, email, password) values(?,?,?)', ['ali1', 'ali1@gmail.com', 'ali123']);
  // $users = DB::table('users')->insert([
  //   'name' => 'ali2',
  //   'email' => 'ali2@gmail.com',
  //   'password' =>'ali123'
  // ]);
  // $users = User::create([
  //   'name' => 'ali',
  //   'email' => 'ali@gmail.com',
  //   'password' => 'ali123'
  // ]);
    $users = User::find(6);
    dd($users->name);
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
