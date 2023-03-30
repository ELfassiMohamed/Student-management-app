<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propositions extends Model
{
    use HasFactory;
    protected $table='propositions';
    protected $fillable = [
            'titre',
            'filiere',
            'cycle',
            'type_props',
            'description',
   ];
    public function users()
            {
                return $this->belongsTo(User::class, 'user_id', 'id');
            }

            
}
