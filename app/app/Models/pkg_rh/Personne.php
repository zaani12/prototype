<?php

namespace App\Models\pkg_rh;

use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personne extends Model
{
    use HasFactory;


    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public $table = 'personnes';
    protected $fillable = ['nom','prenom','type' , 'groupe_id'];
    public function notification()
    {
        return $this->hasMany(Notification::class, 'apprenant_id');
    }
    
}