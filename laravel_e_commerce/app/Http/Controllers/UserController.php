<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'superadmin') {
            return view('users.superadmin');
        } else if ($user->role === 'admin') {
            return view('users.admin');
        } else {
            return view('users.user');
        }
    }

    public function showProfile()
    {
        return view('users.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarName = 'avatar_' . $user->id . '.' . $request->file('avatar')->getClientOriginalExtension();

            $avatarPath = $request->file('avatar')->storeAs('avatars', $avatarName, 'public');
            $validatedData['avatar'] = $avatarPath;
            $user->avatar = $avatarPath;
        }

        $user->fill($validatedData);
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function showPasswordUpdateForm()
    {
        return view('users.update-password');
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

    public function showManageAdmin()
    {
        // Fetch all users
        $users = User::all(); // Assuming your User model is named 'User'

        // Pass the users data to the view
        return view('users.manageadmin', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Validation des données entrées pour la création d'utilisateur
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin,superadmin', // Assurez-vous que le superadmin peut attribuer des rôles appropriés
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Création d'un nouvel utilisateur
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];

        if ($request->hasFile('avatar')) {
            // Gestion de l'avatar
            // ...
        }

        $user->save();

        return redirect()->back()->with('success', 'User created successfully!');
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
        $user = User::find($id);
        return view('users.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,'.$id,
    //         'role' => 'required|string|max:10', // Adjust as needed
    //         'isActive' => 'required|boolean', // Assuming isActive is a boolean field
    //     ]);

    //     $user = User::findOrFail($id);

    //     $user->name = $validatedData['name'];
    //     $user->email = $validatedData['email'];
    //     $user->role = $validatedData['role'];
    //     $user->isActive = $validatedData['isActive'];

    //     $user->save();

    //     return redirect()->route('manageadmin')->with('success', 'User updated successfully!');
    // }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|string|max:10', // Adjust as needed
            'isActive' => 'required|boolean', // Assuming isActive is a boolean field
        ]);

        User::where('id', $id)->update($validatedData);

        return redirect()->route('manageadmin')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('manageadmin')->with('success', 'User deleted successfully!');
    }
}
