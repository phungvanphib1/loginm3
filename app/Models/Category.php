<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory,Notifiable;
    public function products()
    {
        return $this->hasMany(Product::class,'category_id', 'id');
    }
    public function scopesearch($query)
    {
        if ($key = request()->search) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }

    // use HasFactory,Notifiable;
    // public function scopeSearch($query)
    // {
    //     if ($key = request()->key) {
    //         $query = $query->where('name', 'like', '%' . $key . '%');
    //     }
    //     return $query;
    // }

    // public function scopeSearch($query)
    // {
        // $search = $request->input('search');
        // if ($search = request()->search) {
        //     // echo '<a> href="{{route('customers.index')}}"></a>';
        //     $query = $query->where('name', 'like', '%' . $search . '%');
        //     // return redirect()->route('customers.index');
        // }
        // return $query;
        // $customers = Category::where('name', 'LIKE', '%' . $search . '%');
        // // $cities = City::all();
        // return view('customer.index', compact('customers', 'cities'));

        // $search = $request->input('search');
        // if (!$search) {
        //     // echo '<a> href="{{route('customers.index')}}"></a>';
        //     return redirect()->route('category.search');
        // }
        // $customers = Category::where('name', 'LIKE', '%' . $search . '%')->paginate(3);
        // // $cities = City::all();
        // return view('category.search', compact('customers'));

    // }
}
