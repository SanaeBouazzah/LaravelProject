<?php

use App\Models\User;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/result', function () {
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

    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::post('/profile/avatar/ai', [AvatarController::class, 'generate'])->name('profile.avatar.ai');
});

require __DIR__.'/auth.php';

Route::get('/openai', function(){
  $result = OpenAI::images()->create([
    "prompt"=> "Create Avatar for user and looks normal".auth()->user()->name,
    "n"=> 1,
    "size"=> "1024x1024"
  ]);
  return response(['url' => $result->data[0]->url]);
});
