<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Personality;
use PDF;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

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

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = User::all();
  
        // share data to view
        view()->share('users',$data);
        $pdf = PDF::loadView('adminPDF', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_users.pdf');
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
                        $query->where('name', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ])
                ->orderBy('id')
                ->paginate(10);
        } else {
            $users = User::all();
        }

        return view ('admin.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) -1 ) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect(route('admin.users.index'));
        }
        
        $roles = Role::all();
        $categories = Category::all();
        $personalities = Personality::all();

        return view('admin.users.edit')->with([
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

        $user->category()->sync($request->categories);
        $user->personality()->sync($request->personalities);
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->approved = $request->approved;
        $user->price = $request->price;

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }
        
        if ($user->save()){
            $request->session()->flash('success', $user->name . ' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
