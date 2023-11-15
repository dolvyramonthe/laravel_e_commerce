<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user(); // Retrieve the authenticated user

        if ($user->role === 'admin') {
            return view('admin'); // Show the admin dashboard for users with 'admin' role
        } else {
            return view('user'); // Show the user dashboard for users with 'user' role
        }
    }

    public function showProfile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validate the updated information
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate avatar file
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete the current avatar if it exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Generate a unique name for the avatar file
            $avatarName = 'avatar_' . $user->id . '.' . $request->file('avatar')->getClientOriginalExtension();

            // Store the uploaded avatar in the 'public/avatars' directory with the custom name
            $avatarPath = $request->file('avatar')->storeAs('avatars', $avatarName, 'public');
            $validatedData['avatar'] = $avatarPath; // Update the avatar path in the validated data
            $user->avatar = $avatarPath; // Update the avatar path in the user model
        }

        // Update the user's profile information including the avatar path
        $user->fill($validatedData);
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function showPasswordUpdateForm()
    {
        return view('update-password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
