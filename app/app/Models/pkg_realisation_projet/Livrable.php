<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    use HasFactory;

    protected $table = 'livrables';

    protected $fillable = ['titre', 'lien', 'description', 'nature_livrable_id'];

    public function natureLivrable()
    {
        return $this->belongsTo(NatureLivrable::class, 'nature_livrable_id');
    }
}
