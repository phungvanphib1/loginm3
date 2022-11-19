<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // $this->authorize('viewAny', Order::class);
        $items=Order::search()->paginate(5);
        return view('admin.order.index',compact('items'));
    }
    public function detail($id)
    {
        // $this->authorize('view', Order::class);
        $items=DB::table('orderdetail')
        ->join('orders','orderdetail.order_id','=','orders.id')
        ->join('products','orderdetail.product_id','=','products.id')
        ->select('products.*', 'orderdetail.*','orders.id')
        ->where('orders.id','=',$id)->get();
        // dd($items);
        return view('admin.order.orderdetail',compact('items'));
    }
}
