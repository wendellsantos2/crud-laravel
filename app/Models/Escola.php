<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;
    protected $primaryKey = 'escola_id';
    
    protected $fillable = [
        'id_local',
        'escola_id',
        'name',
        'localizacao',
        'image',
        
      
    ];

 
}
