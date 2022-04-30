<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absence;

class NatAbs extends Model
{
    use HasFactory;

    protected $primaryKey = 'CODE_ABS';


    public function absences()
    {
        return $this->hasMany(Absence::class,'ABS_NAT_9','CODE_ABS');
    }
}
