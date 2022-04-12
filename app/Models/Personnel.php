<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absence;

class Personnel extends Model
{
    use HasFactory;

    protected $primaryKey = 'PERS_MAT_95';


    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
