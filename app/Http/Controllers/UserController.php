<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myProfile(){
        $user = Auth::user();

        return view('front.my_profile', compact('user'));
    }

    //profile  pic update
    public function updateProfilePic(Request $request){
        $user = Auth::user();

        if($request->profile != null){
            $file = $request->profile;
            $timestamp = Carbon::now()->timestamp;
            $filename = $timestamp.'_'.$file->getClientOriginalName();

            Storage::disk('public')->put('profile/'.$filename, file_get_contents($file));

            if($user->image != null){
                Storage::disk('public')->delete('profile/'.$user->image);
            }

            $user->update([
                'image' => $filename
            ]);

            return redirect()->back()->with('success_message', 'Profile pic updated successfully');
        }
    }

    //profile update
    public function updateProfile(Request $request){
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->back()->with('success_message', 'Profile updated successfully');
    }
}
