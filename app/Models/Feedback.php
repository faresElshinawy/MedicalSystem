<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'message',
        'patient_id'
    ];

    public static function rules()
    {
        return [
            'name'=>'required|string',
            'subject'=>'required|string',
            'message'=>'required|string',
        ];
    }

}
