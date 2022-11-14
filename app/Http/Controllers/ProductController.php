<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products =Product::search()->paginate(4);
        $categories = Category::all();
        $param = [
            'categories' => $categories,
            'products' => $products,
        ];

        return view('admin.product.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.product.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $file = $request->image;
        // $get_image = $request->file('image');
        // if($get_image){
        //     $get_name_image=$get_image->getClientOriginalName();
        //     $get_name= current(explode('.',$get_name_image));
        //     $new_image= $get_name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('upload',$new_image);
        //     $product->image = $new_image;
        //     $product->save();
        //     $notification = [
        //         'message' => 'Chỉnh Sửa Thành Công!',
        //         'alert-type' => 'success'
        //     ];
        //     return redirect()->route('product.index')->with($notification);
        // }

        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $product->image = $fileExtension;
        }
        // $product->image = $request->image;
        $product->save();
        $notification = [
            'message' => 'Thêm Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productshow = Product::findOrFail($id);
        $param =[
            'productshow'=>$productshow,
        ];

        // $productshow-> show();
        return view('admin.product.show',  $param );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories=Category::get();
        $param = [
            'product' => $product ,
            'categories' => $categories
        ];
        return view('admin.product.edit' , $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $get_image = $request->file('image');
        if($get_image){
            $new_image=rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/assets/upload',$new_image);
            $product->image = $new_image;
            $product->save();
            $notification = [
                'message' => 'Chỉnh Sửa Thành Công!',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.index')->with($notification);
        }
        $product->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
