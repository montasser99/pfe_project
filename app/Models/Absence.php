<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NatAbs ;

class Absence extends Model
{
    use HasFactory;

    public function natAb()
    {
        return $this->hasOne('App\Models\NatAb', 'CODE_ABS', 'ABS_NAT_9');
    }
}
