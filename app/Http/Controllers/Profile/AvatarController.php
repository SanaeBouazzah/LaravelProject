<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvartarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvartarRequest $request)
    {
      $path = $request->file('avatar')->store('avatars');
      auth()->user()->update(['avatar'=> storage_path('app')."/$path"]);
      return back()->with('message','Avatar is changed successfully !');
    }
}
