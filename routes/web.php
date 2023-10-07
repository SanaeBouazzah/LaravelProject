<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use OpenAI\Laravel\Facades\OpenAI;

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
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/openai', function(){
  $result = OpenAI::completions()->create([
    'model' => 'text-davinci-003',
    'prompt' => 'PHP is',
  ]);

  echo $result['choices'][0]['text']; // an open-source, widely-used, server-side scripting language.
});
