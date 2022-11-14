<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    public function adminPermission(){
        $roles = [ 'index','create','update','delete' ];
        return collect($roles);
    }

    public function staffPermission(){
        $roles = [ 'index','create'];
        return collect($roles);
    }


    public function hasPermission( $permission ){
        if( $this->name == 'admin' ){
            $roles = $this->adminPermission();
        }
        if( $this->name == 'staff' ){
            $roles = $this->staffPermission();
        }
        if( $roles->contains($permission) ){
            return true;
        }
        return false;
    }

}
