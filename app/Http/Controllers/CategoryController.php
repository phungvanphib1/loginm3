<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\DB as FacadesDB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        // $activeProducts = DB::table('categories')->where('id', 5 )->get();
        // dd($activeProducts);
        // $categories = Category::search()
        $categories = Category::search()->where('deleted_at',null)->paginate(4);
        $products= Product::get();
        // $categories = Category::search();
        $param = [
            'categories' => $categories,
            'products' => $products
        ];
        return view('admin.category.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        $notification = array(
            'message' => 'Thêm danh mục thành công',
            'alert-type' => 'success'
        );
        return view('admin.category.add')->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        $notification = [
            'message' => 'Thêm Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Category::class);
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        $notification = [
            'message' => 'Chỉnh Sửa Thành Công!',
            'alert-type' => 'success'
        ];
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('forceDelete', Category::class);
        $category=Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
    }


    public  function softdeletes($id){

        $this->authorize('delete', Category::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $notification = [
            'message' => 'Đã chuyển vào kho lưu!',
            'alert-type' => 'success'
        ];
        $category->save();
        return redirect()->route('category.index')->with($notification);

    }

    public  function trash(){
        $this->authorize('viewtrash', Category::class);
        $categories = Category::query(true)->search()->onlyTrashed()->paginate(5);
        $param = ['categories'    => $categories];
        return view('admin.category.trash', $param);
    }

    public function restoredelete($id){
        $this->authorize('restore',Category::class);
        $categories=Category::withTrashed()->where('id', $id);
        $categories->restore();
        $notification = [
                'message' => 'Khôi phục thành công!',
                 'alert-type' => 'success'
            ];
        return redirect()->route('category.trash')->with($notification);;


    }
}
