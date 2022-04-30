<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel ;

class TypeFonction extends Model
{
    use HasFactory;

    protected $primaryKey = 'CODE_TYPE';

    public function personnels()
    {
            return $this->hasMany(Personnel::class, 'PERS_CODFONC_92', 'CODE_TYPE');
    }
}

