<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('profile', compact('user'));
    }

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
    

    $user->save();

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
}

}
