<?php

namespace App\Models;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'doctor';
    protected $hidden = ['password','remember_token'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'specialty_id',
        'phone',
        'type',
        'image',
        'status'
    ];

    public static $uploadPath = 'uploads/Doctors';

    public function specialty()
    {
       return $this->belongsTo(Specialty::class);
    }

    public static function rules()
    {
        return [
        'description'=>'required|min:10|max:255',
        'specialty'=>'required|numeric|exists:specialties,id|gt:0',
        'phone'=>'required|numeric',
        'status'=>'numeric|gt:0|in:isset,deleted'
        ];
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function examination()
    {
        return $this->hasMany(Examination::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function appointments()
    {
        return $this->hasMany(AppointmentBook::class);
    }

}
