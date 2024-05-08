<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilePictureController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->profile_picture->extension();  
        $request->profile_picture->move(public_path('images'), $imageName);

        // Save the image path to the user's profile (assuming User model has a column 'profile_picture')
        $profile=User::where('id',auth()->user()->id)->first();
        $profile->profile_picture=$imageName;
        $profile->save();

        return response()->json(['success'=>'Profile picture uploaded successfully.']);
    }
}
