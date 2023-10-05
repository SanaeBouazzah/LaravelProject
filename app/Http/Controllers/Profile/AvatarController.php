<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvartarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvartarRequest $request)
    {
      dd($request->all());
      return back()->with('message','Avatar is changed successfully !');
    }
}
