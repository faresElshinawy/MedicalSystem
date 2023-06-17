<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'doctor_id',
        'date',
        'time',
        'status'
    ];


    public static function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|email',
            'doctor_id'=>'required|exists:doctors,id',
            'date'=>'required|date:Y-m-d|after:'.date('Y-m-d'),
            'time'=>'required|date_format:H:i|after:12:00'
        ];
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
