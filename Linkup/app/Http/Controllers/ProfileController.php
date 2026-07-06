<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
   public function uploadImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                $oldImagePath = public_path('images/' . $user->profile_image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('images'), $imageName);

            /** @var \App\Models\User $user */
            $user->profile_image = $imageName;
            $user->save();

            return back()->with('success', 'تم تغيير الصورة الشخصية بنجاح!');
        }

        return back()->with('error', 'حدث خطأ أثناء رفع الصورة.');
    }
}
