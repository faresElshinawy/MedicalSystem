<?php

namespace App\Traits;

use Illuminate\Support\Carbon;


trait GetAge {
    public function getAge($birthdate)
    {
        return $age = Carbon::createFromFormat('Y-m-d',$birthdate);
    }
}
