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
        if ($request->term != NULL) {
            $users = User::where([
                ['name', '!=', Null],
                [function ($query) use ($request) {
                    if (($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ])
                ->orderBy('id')
                ->paginate(10);
        } else {
            $users = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 2)
            ->where('users.id', '!=' , auth()->user()->id)
            ->get('users.*');
        }

        return view ('user.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) -1 ) * 5);
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
        
        return view('profile.users.edit')->with([
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
