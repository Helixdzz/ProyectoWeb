<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
{
    $this->authorizeResource(User::class, 'user');
}


    public function index()
    {
        $users = User::paginate(10); // Cambia esto para usar paginación
        return view('users.index', compact('users'));
    }
    



    // Show the form to create a new user (admin only)
    public function create()
    {
        $this->authorize('create', User::class);
        
        return view('users.create');
    }

    // Save a new user to the database (admin only)
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully!');
    }

    // Display a single user (admin only)
    public function show(User $user)
    {
        $this->authorize('view', $user);
        
        return view('users.show', compact('user'));
    }

    // Show the form to edit an existing user (admin only)
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        
        return view('users.edit', compact('user'));
    }

    // Update a user in the database (admin only)
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'nullable|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin ?? $user->is_admin
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully!');
    }

    // Delete a user from the database (admin only)
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        
        // Prevent self-deletion
        if (auth()->id() === $user->id) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account!');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully!');
    }

    public function toggleAdmin(User $user)
{
    $user->is_admin = !$user->is_admin;
    $user->save(); // <- esto es CRUCIAL

    return redirect()->back()->with('success', 'User admin status updated.');
}

    
}