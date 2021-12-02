<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\Carrinho;
class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'user_id',
        'produto_id',
        'datapedido',
        'obervacao',
        'status',

    ];

    public function cliente(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function itens(){
        return $this->hasMany(ItensPedido::class);
    }

    public function precoTotal(){
        $this->itens->preco;
    }



    // public function carrinho(){
    //     return $this->belongsTo(Carrinho::class, 'carrinho_id', 'id');

    //     // return $this->hasMany(Carrinho::class)->select( DB::raw('produto_id, sum(desconto) as descontos, sum(valor) as valores, count(1) as qtd'))->groupBy('produto_id')->orderByRaw('produto_id', 'descricao');
    // }



    /* public static function consultaId($where){
   return !empty($pedido->id) ? $pedido->id : null;
    } */
}
