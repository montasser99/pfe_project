<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;


class H52MvtPointageBrut extends Model
{
    use HasFactory;

    protected $primaryKey = 'MvtPointageID';

    public function personnels()
    {
        return $this->belongsTo(Personnel::class, 'Matricule', 'PERS_MAT_95');
    }
}
