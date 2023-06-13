<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'type',
        'image'
    ];

    public static $uploadPath = 'uploads/Admins';

    public static function rules()
    {
        return [
        'phone'=>'required|numeric|min:11',
        'image'=>'image|max:2048|nullable|mimes:jpeg,png,jpg,gif'
        ];

    }
}
