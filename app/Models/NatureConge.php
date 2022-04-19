<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conge;

class NatureConge extends Model
{
    protected $primaryKey = 'CODE';

    use HasFactory;
    public function conges()
    {

    return $this->hasMany(Conge::class,'CONG_NAT_9','CODE');

    }
}
