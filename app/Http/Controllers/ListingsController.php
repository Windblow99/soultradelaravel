<?php
    
namespace App\Http\Controllers;
    
use App\Models\Listing;
use Illuminate\Http\Request;
    
class ListingsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:listing-list|listing-create|listing-edit|listing-delete', ['only' => ['index','show']]);
         $this->middleware('permission:listing-create', ['only' => ['create','store']]);
         $this->middleware('permission:listing-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:listing-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::latest()->paginate(5);
        return view('listings.index',compact('listings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Listing::create($request->all());
    
        return redirect()->route('listings.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return view('listings.show',compact('listing'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit',compact('listing'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $listing->update($request->all());
    
        return redirect()->route('listings.index')
                        ->with('success','Listing updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
    
        return redirect()->route('listings.index')
                        ->with('success','Listing deleted successfully');
    }
}