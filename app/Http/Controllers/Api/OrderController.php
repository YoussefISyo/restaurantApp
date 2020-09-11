<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderContentResource;
use App\Http\Resources\OrderContentsResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrdersResource;
use App\Order;
use App\OrderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OrdersResource(Order::paginate(env('ORDERS_PER_PAGE')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'payment' => 'required',
            'totalprice' => 'required',
            'address' => 'required',
        ]);

        $order = new Order();

        $order->user_id = $request->get('user_id');
        $order->payment = $request->get('payment');
        $order->totalprice = $request->get('totalprice');
        $order->ordertime = Carbon::now()->format('Y-m-d H:i:s');
        $order->address = $request->get('address');

        $order->save();

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new OrderResource(Order::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return new OrderResource($order);
    }

    public function orderContents($id){
        $order = Order::find($id);
        $orderContents = $order->orderContents()->paginate();
        return new OrderContentsResource($orderContents);
    }

    public function contents(Request $request){
        $request->validate([
            'order_id'=> 'required',
            'meal_id'=> 'required',
            'quantity'=> 'required'
        ]);

        $content = new OrderContent();

        $content->order_id = $request->get('order_id');
        $content->meal_id = $request->get('meal_id');
        $content->quantity = $request->get('quantity');

        $content->save();

        return new OrderContentResource($content);
    }

    public function destroyContent($id){
        $content = OrderContent::find($id);
        $content->delete();

        return new OrderContentResource($content);
    }
}
