<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Personality;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
     /**
     * Limiting page view to roles.
     *
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user('id');
        $user = User::find($user_id);
        return view ('profile.users.index')->with('users', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {   
        $categories = Category::all();
        $personalities = Personality::all();
        $roles = Role::all();
        return view('profile.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'categories' => $categories,
            'personalities' => $personalities,
        ]);
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
        $user->category()->sync($request->categories);
        $user->personality()->sync($request->personalities);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        
        if ($user->save()){
            $request->session()->flash('success', $user->name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('profile.users.index');
    }
}
