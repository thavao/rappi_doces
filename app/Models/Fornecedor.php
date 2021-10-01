<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nome',
        'cnpj',
    ];
    //definindo chave primaria do fornecedor (pro laraveol)
    public function produto(){
        return $this->hasMany(Produto::class, 'fornecedor_id');
    }
}
