<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
       return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return
     */
    public function store(StoreRequest $request)
    {
       $data = $request->only(['name', 'password', 'email', 'role_id']);
       $data['password'] = bcrypt($data['password']);
       User::create($data);
       return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'password', 'email', 'role_id']);
        if (isset($data['password']) && $data['password']) {
            $data['password'] = bcrypt($data['password']);
        }

        if (!isset($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();


        return redirect()->route('dashboard.users.index');
    }
}
