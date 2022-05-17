<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;

class Signataire extends Model
{
    use HasFactory;

    public function personnelWithStag()
    {
        return $this->belongsTo(Personnel::class, 'signataire_id', 'PERS_MAT_95');
    }

}
