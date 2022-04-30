<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;

class DemandeConge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_deb', 'date_fin','adresse_conge',
    'phone','NatureDeConge','interim','statu','fonction','direction',
    'personnel_id'];

    public function personnels()
    {
        return $this->belongsTo(Personnel::class, 'personnel_id','PERS_MAT_95');
    }
}
