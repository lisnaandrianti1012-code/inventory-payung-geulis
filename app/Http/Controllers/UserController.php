<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {

        $user = User::latest()->get();

        return view(
            'user.index',
            compact('user')
        );
    }

    public function create()
    {

        return view('user.create');
    }

    public function store(Request $request)
    {

        User::create([

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'password' =>
                Hash::make($request->password),

            'role' =>
                $request->role,

        ]);

        return redirect('/user')
            ->with('success',
            'User berhasil ditambahkan');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);

        return view(
            'user.edit',
            compact('user')
        );
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->update([

            'name' =>
                $request->name,

            'email' =>
                $request->email,

            'role' =>
                $request->role,

        ]);

        return redirect('/user')
            ->with('success',
            'User berhasil diupdate');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/user')
            ->with('success',
            'User berhasil dihapus');
    }
}
