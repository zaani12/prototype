<?php

namespace App\Models\pkg_autorisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'action_id',
        'role_id',
        'created_at',
        'updated_at',
    ]; 
}
