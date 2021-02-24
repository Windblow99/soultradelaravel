<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $order = new Order;
        $order->pricing = $request->price;
        $order->type = 'User';
        $order->seller_id = $request->id;
        $order->seller_name = $request->name;
        $order->buyer_id = auth()->user()->id;
        $order->buyer_name = auth()->user()->name;
        $order->save();

        DB::update(
            'update users set balance = balance - ? WHERE users.id = ?',
            [$request->price, auth()->user()->id]
        );

        DB::update(
            'update users set balance = balance + (? * 0.8) WHERE users.id = ?',
            [$request->price, $request->id]
        );

        DB::update(
            'update users set balance = balance + (? * 0.2) WHERE users.id = ?',
            [$request->price, 1]
        );
        
        if ($order->save()){
            $request->session()->flash('success', 'Order has been created');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('user.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showSentOrders(Order $orders)
    {
        $orders = DB::table('orders')->where('buyer_id', auth()->user()->id)->get();
        return view ('order.users.sent')->with('orders', $orders);
    }

    public function showReceivedOrders(Order $orders)
    {
        $orders = DB::table('orders')->where('seller_id', auth()->user()->id)->get();
        return view ('order.users.sent')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('order.users.edit')->with([
            'user' => $user,
        ]);
    }
}
