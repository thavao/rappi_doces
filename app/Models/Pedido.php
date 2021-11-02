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
        'User_id',
        'produto_id',
        'datapedido',
        'valorunitariop',
        'quantidade',
        'observacao',

    ];
    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }
    public function cliente(){
        return $this->belongsTo(User::class, 'User_id');
    }

    public function carrinho(){
        return $this->hasMany(Carrinho::class, 'carrinho_id')->select( DB::raw('produto_id, sum(desconto) as descontos, sum(valor) as valores, count(1) as qtd'));
    }
}
