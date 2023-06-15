<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    public static $uploadPath = 'uploads/Examination';

    protected $fillable = [
        'title',
        'doctor_id',
        'patient_id',
        'price',
        'offer',
        'status',
        'time',
        'file',
        'description'
    ];

    public static function rules()
    {
        return [
            'title'=>'nullable|string|max:255',
            'patient'=>'required|gt:0|exists:patients,id',
            'price'=>'required|numeric',
            'offer'=>'required|numeric',
            'time'=>'required|date_format:Y-m-d',
            'file'=>'nullable|mimes:pdf,excel,docs',
            'description'=>'nullable|string'
        ];
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
