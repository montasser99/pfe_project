<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NatureConge;

class Cconge extends Model
{
    use HasFactory;

    public function natureconges()
    {
        return $this->belongsTo(NatureConge::class, 'CCONG_NAT_9', 'CODE');
    }
}
