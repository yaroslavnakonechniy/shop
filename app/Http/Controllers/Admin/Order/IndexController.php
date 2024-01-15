<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class IndexController extends Controller
{
    public function index(){

        $orders = Order::where('status',1)->get();

        return view('admin.order.index', compact('orders'));
    }
}
