<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'preco',
        'descricao',
        'qtdestoque',
        'NomeProduto',

    ];

    //define um relacionamento entre produto e fornecedor
    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
    //define um relacionamento entre produto e pedido
    public function pedido(){
        return $this->hasMany(Produto::class, 'pedido_id');
    }
    //define um relacionamento entre produto e foto
    public function fotop(){
        return $this->hasMany(Produto::class, 'fotop_id');
    }
}
