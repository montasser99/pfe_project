<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NatureConge;

class Conge extends Model
{
    use HasFactory;

    public function nature_conges(){

        return $this->hasOne(NatureConge::class,'CODE','CONG_NAT_9');

}
}
