<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Personality;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
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
    public function index(Request $request, User $users)
    {
        $categories = Category::all();
        $personalities = Personality::all();
   
        $users = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 2)
            ->where('users.id', '!=' , auth()->user()->id)
            ->where('users.availability', '=' , 'YES')
            ->where('users.approved', '=' , 'YES')
            ->get('users.*');

        return view ('user.users.index', compact('users'))->with([
            'categories' => $categories,
            'personalities' => $personalities,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $categories = Category::all();
        $personalities = Personality::all();
        
        return view('user.users.show')->with([
            'user' => $user,
            'categories' => $categories,
            'personalities' => $personalities
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }
}
