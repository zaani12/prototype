<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureLivrable extends Model
{
    use HasFactory;

    protected $table = 'nature_livrables';

    protected $fillable = ['nom', 'description'];
    public function livrables()
    {
        return $this->hasMany(Livrable::class, 'nature_livrable_id');
    }
}
