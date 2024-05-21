<?php

namespace App\Models\pkg_competences;

use App\Models\Technologie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieTechnologie extends Model
{
    use HasFactory;

    public function Technologie(){
        $this->belongsTo(Technologie::class);
    }
}
