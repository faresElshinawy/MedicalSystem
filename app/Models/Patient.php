<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'patient';
    protected $hidden = ['password','remember_token'];
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

    public function examination()
    {
        return $this->hasMany(Examination::class);
    }

    public static function rules()
    {
        if(Auth::guard('doctor')->check() || Auth::guard('patient')->check())
        {
            $doctorValidation = 'nullable|exists:doctors,id|gt:0';
        }
        else
        {
            'required|exists:doctors,id|gt:0';
        }
        return [
            'birthdate'=>'required|date_format:Y-m-d',
            'address'=>'nullable|max:255',
            'image'=>'nullable|max:20248|mimes:jpeg,jpg,png,gif',
            'doctor'=>$doctorValidation
        ];
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

}
