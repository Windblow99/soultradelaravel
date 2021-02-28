<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MedicalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $users)
    {
        if ($request->term != NULL) {
            $users = User::where([
                ['name', '!=', auth()->user()->name],
                [function ($query) use ($request) {
                    if (($term = $request->term)) {
                        $query->where('name', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ])
                ->orderBy('id')
                ->paginate(10);
        } else {
            $users = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 3)
            ->where('users.id', '!=' , auth()->user()->id)
            ->where('users.availability', '=' , 'YES')
            ->where('users.approved', '=' , 'YES')
            ->get('users.*');
        }

        return view ('medical.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) -1 ) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('medical.users.show')->with([
            'user' => $user,
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
