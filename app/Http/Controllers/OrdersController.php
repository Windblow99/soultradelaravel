<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Order::all();
  
        // share data to view
        view()->share('orders',$data);
        $pdf = PDF::loadView('ordersPDF', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_orders.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->balance < $request->price) {
            $request->session()->flash('error', 'Please check your balance');
            return redirect()->route('user.users.index');
        } else {
            $order = new Order;
            $order->pricing = $request->price;
            $order->type = $request->type;
            $order->seller_id = $request->id;
            $order->seller_name = $request->name;
            $order->buyer_id = auth()->user()->id;
            $order->buyer_name = auth()->user()->name;
            $order->purpose = $request->purpose;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showSentOrders(Order $orders)
    {
        $orders = DB::table('orders')
            ->where('buyer_id', auth()->user()->id)
            ->where('type', 'Professional')
            ->get();
        return view ('order.users.sent')->with('orders', $orders);
    }

    public function showReceivedOrders(Order $orders)
    {
        $orders = DB::table('orders')
            ->where('seller_id', auth()->user()->id)
            ->where('type', 'Professional')
            ->get();
        return view ('order.users.received')->with('orders', $orders);
    }

    public function showSentRequests(Order $orders)
    {
        $orders = DB::table('orders')
            ->where('buyer_id', auth()->user()->id)
            ->where('type', 'User')
            ->get();

        return view ('requests.users.sent')->with('orders', $orders);
    }

    public function showReceivedRequests(Order $orders)
    {
        $orders = DB::table('orders')
            ->where('seller_id', auth()->user()->id)
            ->where('type', 'User')
            ->get();

        return view ('requests.users.received')->with('orders', $orders);
    }

    public function showAllOrders(Order $orders)
    {
        $orders = DB::table('orders')->get();
        return view ('order.users.all')->with('orders', $orders);
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
