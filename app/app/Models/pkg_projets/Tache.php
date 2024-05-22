<?php

namespace App\Models\pkg_projets;

use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    public function Personne(){
        return $this->belongsTo(Personne::class);
    }

    public function Projet(){
        return $this->belongsTo(Projet::class);
    }

    public function StatutTache(){
        return $this->hasMany(StatutTache::class);
    }
}
