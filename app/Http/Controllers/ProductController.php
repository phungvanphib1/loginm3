<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Product::class);
        $products =Product::search()->paginate(4);
        $param = [
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
        $this->authorize('create', Product::class);
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
        $this->authorize('view', Product::class);
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
        $this->authorize('update', Product::class);
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
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $product->image = $fileExtension;
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
        $this->authorize('forceDelete', Product::class);
        $category=Product::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
    }

    public  function trash(){
        $this->authorize('viewtrash', Product::class);
        $products = Product::query(true)->search()->onlyTrashed()->paginate(4);
        $param = ['products'    => $products];
        return view('admin.product.trash', $param);
    }

    public  function softdeletes($id){

        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        $notification = [
            'message' => 'Đã chuyển vào kho lưu!',
            'alert-type' => 'success'
        ];
        $product->save();
        return redirect()->route('product.index')->with($notification);

    }

    public function restoredelete($id){

        $this->authorize('restore', Product::class);
        $product=Product::withTrashed()->where('id', $id);
        $product->restore();
        $notification = [
                'message' => 'Khôi phục thành công!',
                 'alert-type' => 'success'
            ];
        return redirect()->route('product.trash')->with($notification);;


    }

}
