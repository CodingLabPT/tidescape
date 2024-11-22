<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // Defina a tabela associada, se o nome não seguir a convenção
    protected $table = 'brands';

    // Defina os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'logo',
        'url',
    ];

    // Se você estiver usando timestamps, não é necessário definir isso, pois o Laravel faz isso automaticamente
    // Caso contrário, você pode desativar com:
    // public $timestamps = false;
}
