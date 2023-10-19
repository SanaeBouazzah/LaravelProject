<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvartarRequest;

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
    public function generate(Request $request){
      $result = OpenAI::images()->create([
        "prompt"=> "Create Avatar for user".auth()->user()->name,
        "n"=> 1,
        "size"=> "1024x1024",
      ]);

      $contents =file_get_contents($result->data[0]->url);
      $filename = Str::random(25);

      if($oldavatar = $request->user()->avatar){
        Storage::disk('public')->delete($oldavatar);
       }
      Storage::disk('public')->put("avatars/$filename.jpg", $contents);
      auth()->user()->update(['avatar'=> "avatars/$filename.jpg"]);
      return back()->with('message','Avatar is changed successfully !');
    }
}
