<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{
    /**
     * Show the form for creating a new user role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if the authenticated user is a super admin
        if (Auth::user()->role_id === 0) {
            // Get all users and roles
            $users = User::all();
            $roles = Role::all();

            return view('user_roles.create', compact('users', 'roles'));
        } else {
            // Redirect to the home page if the authenticated user is not a super admin
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created user role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if the authenticated user is a super admin or an admin
        if (Auth::user()->role_id <= 1) {
            // Validate the request data
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'role_id' => 'required|exists:roles,id',
            ]);

            // Create the user role
            UserRole::create($request->all());

            // Redirect to the home page
            return redirect()->route('home');
        } else {
            // Redirect to the home page if the authenticated user is not a super admin or an admin
            return redirect()->route('home');
        }
    }
}