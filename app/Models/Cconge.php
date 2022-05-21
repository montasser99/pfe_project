<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NatureConge;
use App\Models\Personnel;

class Cconge extends Model
{
    protected $primaryKey = ['CCONG_MAT_95', 'CCONG_NAT_9','CCONG_DATE_DEB','CCONG_DATE_FIN'];
    public $incrementing = false;

    use HasFactory;

    public function natureconges()
    {
        return $this->belongsTo(NatureConge::class, 'CCONG_NAT_9', 'CODE');
    }
    public function personnels(){

        return $this->belongsTo(Personnel::class, 'CCONG_MAT_95','PERS_MAT_95');
    }
    function is_decimal( $val )
{
    return is_numeric( $val ) && floor( $val ) != $val;
}
}
