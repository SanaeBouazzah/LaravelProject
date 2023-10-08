<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvartarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvartarRequest $request)
    {
    if($oldavatar = $request->user()->avatar){
      Storage::disk('public')->delete($oldavatar);
    }
      $path = $request->file('avatar')->store('avatars', 'public');
      auth()->user()->update(['avatar'=> $path]);
      
      return back()->with('message','Avatar is changed successfully !');
    }
    public function generate(){
      
    }
}
