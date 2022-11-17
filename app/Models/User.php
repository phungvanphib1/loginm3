<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;

class User extends Authenticatable
{   use Notifiable;
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;
    protected $fillable = ['name','address','phone','image','gender','birthday','email','password','position_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
    public function scopesearch($query)
    {
        if ($key = request()->search) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }

    // public function hasPermission( $permission ){
    //     if( $this->name == 'admin' ){
    //         $roles = $this->adminPermission();
    //     }
    //     if( $this->name == 'staff' ){
    //         $roles = $this->staffPermission();
    //     }
    //     if( $roles->contains($permission) ){
    //         return true;
    //     }
    //     return false;
    // }

}
