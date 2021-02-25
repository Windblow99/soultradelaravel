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
        return View ('profile.users.index')->with('users', $user);
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
        $this->validate($request, [
            'profile_picture' => 'image|null|max:1999',
            'verification_document' => 'image|null|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('profile_picture')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('profile_picture')->storeAs('public/profile_pictures', $fileNameToStore);
        }

        // Handle File Upload
        if ($request->hasFile('verification_document')) {
            // Get filename with the extension
            $filenameWithExt2 = $request->file('verification_document')->getClientOriginalName();

            // Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);

            // Get just extension
            $extension2 = $request->file('verification_document')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;

            // Upload Image
            $path = $request->file('verification_document')->storeAs('public/verification_documents', $fileNameToStore2);
        }

        $user->category()->sync($request->categories);
        $user->personality()->sync($request->personalities);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->availability = $request->availability;
        $user->price = $request->price;

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        if ($request->hasFile('verification_document')) {
            $user->verification_file = $fileNameToStore2;
        }
        
        if ($user->save()){
            $request->session()->flash('success', $user->name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('profile.users.index');
    }
}
