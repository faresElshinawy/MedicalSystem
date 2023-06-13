<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'password',
        'age',
        'birthdate',
        'image',
        'address',
        'doctor_id'
    ];

    public static $uploadPath = 'uploads/patients';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function Examination()
    {
        return $this->hasMany(Examination::class);
    }

    public static function rules()
    {
        return [
            'birthdate'=>'required|date_format:Y-m-d',
            'address'=>'nullable|max:255',
            'image'=>'nullable|max:20248|mimes:jpeg,jpg,png,gif',
            'doctor'=>'required|exists:doctors,id|gt:0'
        ];
    }

}
