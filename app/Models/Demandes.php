<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{
    use HasFactory;
    protected $table = 'demandes';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
