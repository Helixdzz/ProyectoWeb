<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Save a new user to the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('users.index');
    }

    // Display a single user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show the form to edit an existing user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update a user in the database
    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:5', // Allow password to be optional
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    // Only update the password if a new one is provided
    if ($request->password) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('users.index');
}

    // Delete a user from the database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}