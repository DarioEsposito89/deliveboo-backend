<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant->id; //prendiamo id restaurant

        $orders = DB::table('orders')
            ->join('order_plate', 'orders.id', '=', 'order_plate.order_id')
            ->join('plates', 'order_plate.plate_id', '=', 'plates.id')
            ->where('plates.restaurant_id', '=', $restaurant_id)
            ->select('orders.*') // Seleziona tutti i campi di orders
            ->distinct()
            ->get();
            @dd($orders);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($order_id)
    {

        $order = Order::find($order_id);

        $restaurant_id = Auth::user()->restaurant->id; //prendiamo id restaurant

        $plates = DB::table('orders')
            ->join('order_plate', 'orders.id', '=', 'order_plate.order_id')
            ->join('plates', 'order_plate.plate_id', '=', 'plates.id')
            ->where('plates.restaurant_id', '=', $restaurant_id)
            ->where('orders.id', '=', $order_id)
            ->select('order_plate.*', 'plates.*')
            ->distinct()
            ->get();

            return view('admin.orders.show', compact('plates','order'));
    }

}




