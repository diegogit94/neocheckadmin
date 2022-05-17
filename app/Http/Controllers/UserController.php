<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(8);

        return view('users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
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
        $user = User::where('id', $id)->get();

        $roles = Role::all();

        return view('users.user', compact(['user', 'roles']));
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
        $user = User::find($id);

        if (!$user->hasRole($request->role)) {
            $user->syncRoles([$request->role]);

            return redirect()
            ->route('users.index', $id)
            ->with('status', 'El rol se ha actualizado correctamente.');
        } else {
            return redirect()
                ->route('users.show', $id)
                ->with('status', 'El usuario ya cuenta con este rol.');
        }
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

        return redirect()
            ->route('users.index')
            ->with('status', 'Se ha eliminado el usuario');
    }

    /**
     * Search users by name or email.
     * 
     * @param Request $request
     * 
     * @return [type]
     */
    public function search(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'. $request['query'] . '%')
                        ->orWhere('email', 'LIKE', '%'. $request['query'] . '%')
                        ->paginate(8);

        return view('users.users', compact('users'));
    }
}
