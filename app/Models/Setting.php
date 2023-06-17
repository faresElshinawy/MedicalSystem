<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public static $uploadPath = 'PatientAssets/img';

    protected $fillable = [
        'name',
        'value'
    ];

    public static function  rules()
    {
        return [
            'value'=>'required|string|max:999'
        ];
    }
}
