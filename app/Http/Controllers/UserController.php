<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::with('roles')->get(),
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create( $request->all() );

        $user->roles()->sync($request->roles);

        return to_route('users.index')->with('success', 'Usuario creado');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user->load(['roles']),
            'roles' => Role::all(),
        ]);
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $user->fill( $request->all() );
        $user->save();

        $user->roles()->sync($request->roles);

        return to_route('users.index')->with('success', 'Usuario actualizado');
    }
}
