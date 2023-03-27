<?php

namespace Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory,Notifiable,HasApiTokens;

     protected $fillable = [
        'username',
        'mobile_no',
        'user_type',
        'first_name',
        'middle_name',
        'last_name',
        'is_admin',
        'status',
        'name',
        'email',
        'password',
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function newFactory()
    {
        return \Modules\Users\Database\factories\UserFactory::new();
    }
}
