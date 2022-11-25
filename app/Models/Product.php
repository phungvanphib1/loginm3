<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
    public function scopesearch($query)
    {
        if ($key = request()->search) {
            $query->where('name', 'like', '%' . $key . '%')
                ->orWhere('price', 'like', '%' . $key . '%')
                ->orWhere('id', 'like', '%' . $key . '%');
        }
        return $query;
    }

    // tìm theo category
    public function scopeNameCate($query, $request)
    {
        if ($request->has('category_id')) {
            return $query->whereHas('category', function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            });
        }
    }
    // tìm theo khoảng giá
    public function scopeFilterPrice($query, array $filters)
    {
        if (isset($filters['startPrice']) && isset($filters['endPrice'])) {
            $query->whereBetween('price', [$filters['startPrice'], $filters['endPrice']]);
        }
        return $query;
    }
    // tìm theo ngày
    public function scopefilterDate($query, array $date_to_date)
    {
        if (isset($date_to_date['start_date']) && isset($date_to_date['end_date'])) {
            $query->whereBetween('created_at', [$date_to_date['start_date'], $date_to_date['end_date']]);
        }
        return $query;
    }

}
