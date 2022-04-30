<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;

class Natureagent extends Model
{
    use HasFactory;

    protected $primaryKey = 'NATAG_CODE_93';

    public function personnels()
    {
        return $this->hasMany(Personnel::class,'PERS_NATURAGENT_93','NATAG_CODE_93');
    }
}
