<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    public function collection()
    {/////////join
        return DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.name', 'products.price','products.amount','categories.name as cateName'
        ,'products.created_at', 'products.updated_at',
        )->get();
    }
    public function headings() :array
    {
        ////////các cột của bảng excel
    	return ["Tên Sản Phẩm", "Giá(VND)", "Số Lượng","Danh Mục","Ngày Nhập","Ngày Sửa"];
    }
}
