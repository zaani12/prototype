<?php

namespace App\Models\pkg_notifications;

use App\Models\pkg_rh\Apprenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'isVue',
        'apprenant_id',

    ];

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class, 'apprenant_id');
    }
}