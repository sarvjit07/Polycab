<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminDashboard()
    {
        $users = User::where('is_admin', false)->get(); // Fetch only non-admin users
        return view('admin.dashboard', compact('users'));
    }

    public function index()
    {
        $users = User::where('is_admin', false)->get(); // Fetch only non-admin users
        return view('admin.user_manage', compact('users'));
    }

    public function create()
    {
        return view('admin.create_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'role' => 'required|string|in:student,teacher,boy,girl',
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Ensure the created user is not an admin
        ]);

        return redirect()->route('admin.user_manage')->with('success', 'User created successfully.');
    }
}
