<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest; 

use App\User;

use Intervention\Image\Facades\Image; 

use App\Services\CheckExtensionServices; 
use App\Services\FileUploadServices; 

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findorFail($id);

        //dd($user); 

        return view('users.show', compact('user')); 
    }

    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('users.edit', compact('user')); 
    }

    public function update($id, ProfileRequest $request)
    {

        $user = User::findorFail($id);      
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->self_introduction = $request->self_introduction;
        $user->introduction = $request->introduction;

        $user->save();

        return redirect('home'); 
    }
}
