<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'slug',
        'imagem',
        'id_categoria',
        'id_user',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function categoria(){
        return $this->belongsTo(categoria::class, 'id_categoria');
    }
}
