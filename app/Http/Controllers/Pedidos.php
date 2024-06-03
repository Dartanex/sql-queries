<?php

namespace App\Http\Controllers;

use App\Models\Pedidos as ModelsPedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Pedidos extends Controller
{
    public function createOrder(Request $request){

        $validator = Validator::make($request->all(),[
            'product_name' => 'required|string',
            'quantity' => 'required|numeric',
            'total_price' => 'required|numeric',
            'id_usuario' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Validator Error!',
                'data' => $validator->errors()
            ], 409);
        }

        $order = new ModelsPedidos();
        $order->product_name = $request->product_name;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;
        $order->id_usuario = $request->id_usuario;
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Order Created!',
            'data' => $order
        ],201);
    }

    public function orders(){

        $orders = ModelsPedidos::get();
        return response()->json([
            'status' => true,
            'message' => 'Get all orders!',
            'data' => $orders
        ],200);
    }

    public function getAllOrdersByIdTwo(){

        $order = ModelsPedidos::where('id_usuario', 2)->get();

        if(!$order){
            return response()->json([
                'status' => false,
                'message' => 'No order made by user ID 2!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get all orders made by ID 2!',
            'data' => $order
        ],200);
    }

    public function getAllOrdersWithUserNameAndEmail(){
        $orders = ModelsPedidos::join('usuarios', 'pedidos.id_usuario', 'usuarios.id')
        ->select(
            'pedidos.id',
            'pedidos.product_name',
            'pedidos.quantity',
            'pedidos.total_price',
            'usuarios.name',
            'usuarios.email'
        )
        ->get();

        if(!$orders){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get all orders white user name and email!',
            'data' => $orders
        ],200);
    }

    public function getOrdersbyTotalPriceRange(){
        
        $orders = DB::table('pedidos')->whereBetween('total_price',[100,250])->get();

        if(!$orders){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get all orders with Total price between $100 and $250!',
            'data' => $orders
        ],200);
    }

    public function totalOrdersForUserIDFive(){

        $ordersTotal = ModelsPedidos::where('id_usuario', 5)->selectRaw('COUNT(id_usuario) as Total_Pedidos')->first();

        if(!$ordersTotal){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get the total of orders made by user with ID 5!',
            'data' => $ordersTotal
        ],200);
    }

    public function ordersByTotalPriceDescSort(){

        $ordersDescSort = ModelsPedidos::with('usuarios')->orderBy('total_price', 'DESC')->get();

        if(!$ordersDescSort){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get the total for user with ID 5!',
            'data' => $ordersDescSort
        ],200);
    }

    public function getTotalForAllOrders(){
        
        $ordersTotal = ModelsPedidos::selectRaw('SUM(total_price) as Total_de_todos_los_pedidos')->first();
        
        if(!$ordersTotal){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get the total for all orders!',
            'data' => $ordersTotal
        ],200);
    }

    public function cheapestOrderWithUserName(){

        $cheapestOrder = ModelsPedidos::join('usuarios', 'pedidos.id_usuario', 'usuarios.id')
        ->select(
            'pedidos.id',
            'pedidos.product_name',
            'pedidos.quantity',
            'pedidos.total_price',
            'usuarios.name'
        )
        ->orderBy('total_price', 'ASC')
        ->first();

        if(!$cheapestOrder){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get the cheapest order!',
            'data' => $cheapestOrder
        ],200);
    }

    public function getOrdersGroupByUsername(){
        $orders = ModelsPedidos::join('usuarios', 'pedidos.id_usuario', 'usuarios.id')
        ->select(
            'usuarios.name', 
            ModelsPedidos::raw('GROUP_CONCAT(pedidos.product_name) as product_names'), 
            ModelsPedidos::raw('SUM(pedidos.quantity) as total_quantity'), 
            ModelsPedidos::raw('SUM(pedidos.total_price) as total_price')
        )
        ->groupByRaw('usuarios.name')
        ->get();

        if(!$orders){
            return response()->json([
                'status' => false,
                'message' => 'No orders retrieved!',
                'data' => 'Not Data'
            ], 409);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get the orders group by users!',
            'data' => $orders
        ],200);
    }
}
