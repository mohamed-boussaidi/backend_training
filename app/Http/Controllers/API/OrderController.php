<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('collaborateur' ,'products')
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')->get();
        return response()->json($orders);
    }
    public function update(Request $request, $id){
        $order = Order::find($id);
        $order->collaborateur_id = $request->input('collaborateur_id');
        $order->status = 'pendding';
        if($order->save()){
            $data=Order::all()->last();
            $products = json_decode($request->input('products'));

            foreach ($products as $product){
                $order_product = new OrderProduct();
                $order_product->order_id=$data->id;
                $order_product->product_id=$product;
                $order_product->save();
            }
            
        }
        return response()->json([
            'status'=> 200,
            'message'=>'Order Update Successfully',
        ]);

     }


    public function getCongeById($id)
    {
        $conge = Conge::find($id);
        return response()->json($conge)->setStatusCode(200);
    }
    public function addOrder(Request $request)
    {
        $order = new Order();
        $order->collaborateur_id = $request->input('collaborateur_id');
        $order->status = 'pendding';
        if($order->save()){
            $data=Order::all()->last();
            $products = json_decode($request->input('products'));

            foreach ($products as $product){
                $order_product = new OrderProduct();
                $order_product->order_id=$data->id;
                $order_product->product_id=$product;
                $order_product->save();
            }
            
        }

        return response()->json([
            'status'=> 200,
            'message'=>'Order Added Successful',
        ]);
    }


    public function acceptOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'accepted';
        $order->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Order Accepted Successfully',
        ]);
    }

    public function rejectOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Order Rejected Successfully',
        ]);
    }

    public function deleteOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order -> delete();
        return response()->json([
            'status'=> 200,
            'message'=>'Order deleted Successfully',
        ]);
    }

}
