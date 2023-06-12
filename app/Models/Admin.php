<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

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
        'password'=>'min:6|max:255|required',
        'phone'=>'required|numeric|min:11',
        'image'=>'image|max:2048|nullable|mimes:jpeg,png,jpg,gif'
        ];

    }
}
