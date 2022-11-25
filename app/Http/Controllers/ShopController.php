<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::search()->limit(3)->get();
        $param = [
            'products' => $products
        ];
        return view('shop.dashboardShop', $param);
    }

    public function products()
    {
        $products = Product::get();
        $param = [
            'products' => $products
        ];
        return view('shop.products', $param);
    }

    public function viewlogin()
    {
        return view('shop.login');
    }

    public function checklogin(Request $request)
    {
        $notification = [
            'message' => 'error',
        ];
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('shop.index');
        } else {
            return redirect()->route('shop.viewlogin')->with($notification);
        }
    }

    public function register()
    {
        return view('shop.register');
    }

    public function checkregister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:customers|email',
            'password' => 'required|min:6',
        ]);

        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = 'Chưa Nhập';
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);

        if ($request->password == $request->confirmpassword) {
            $customer->save();
            return redirect()->route('shop.viewlogin')->with($notifications);
        } else {
            return redirect()->route('shop.register')->with($notification);
        }
    }

    public function cart()
    {
        $products = Product::all();
        $categories = Category::all();
        $param = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('shop.cart', $param);
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

    public function store($id)
    {
        $notification = [
            'message' => 'Thêm Thành Công!', 
            'alert-type' => 'success'
        ];

        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nameVi" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                'image' => $product->image,
                'max' => $product->quantity,
            ];
        }

        session()->put('cart', $cart);
        $data = [];
        $data['cart'] = session()->has('cart');
        return redirect()->route('shop.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categorys = Category::get();
        $param = [
            'product' => $product,
            'categorys' => $categorys
        ];
        return view('shop.showproduct', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $totalCart = number_format(($cart[$request->id]["price"]) * $cart[$request->id]["quantity"]);
            $totalAllCart = 0;
            $TotalAllRefreshAjax = 0;
            foreach ($cart as $id => $details) {
                $totalAllCart = $details['price'] * $details['quantity'];
                $TotalAllRefreshAjax += $totalAllCart;
            }
            session()->put('cart', $cart);
            session()->flash('message', 'Cart updated successfully');
            return response()->json([
                'status' => 'cập nhật thành công',
                'totalCart' => '' . $totalCart,
                'TotalAllRefreshAjax' => '' . number_format($TotalAllRefreshAjax),
            ]);
        }
    }

    public function remove(Request $request)
    {
        // dd($request);
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->put('cart', $cart);
            return response()->json(['status' => 'Xóa đơn hàng thành công']);
        }
    }
    public function checkOuts()
    {
        return view('shop.checkout');
    }

    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->total = $request->totalAll;
            $order->save();
        }
                $count_product = count($request->product_id);
                for ($i = 0; $i < $count_product; $i++) {
                    $orderItem = new OrderDetail();
                    $orderItem->order_id =  $order->id;
                    $orderItem->product_id = $request->product_id[$i];
                    $orderItem->quantity = $request->quantity[$i];
                    $orderItem->total = $request->total[$i];
                    $orderItem->save();
                    session()->forget('cart');
                    DB::table('products')
                        ->where('id', '=', $orderItem->product_id)
                        ->decrement('amount', $orderItem->quantity);
                }
                $notification = [
                    'message' => 'success',
                ];

        // dd($request);
        // alert()->success('Thêm Đơn Đặt: '.$request->name,'Thành Công');
        return redirect()->route('shop.index')->with($notification);;
        // }
        // } catch (\Exception $e) {
        //     // dd($request);
        //     Log::error($e->getMessage());
        //     // toast('Đặt hàng thấy bại!', 'error', 'top-right');
        //     return redirect()->route('shop.index');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('shop.index');
    }
}
