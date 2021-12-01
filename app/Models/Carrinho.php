<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Carrinho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'id',
        'produto_id',
        'user_id',
        'quantidade',
        'datacarrinho',

    ];

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function totalItem(){
        return $this->produto->preco * $this->quantidade;
    }

    public static function totalGeral(){
        $itens = Carrinho::where('user_id', '=', Auth::user()->id)->get();
        $total = 0;
        foreach($itens as $item){
            $total += $item->produto->preco * $item->quantidade;
        }
        return $total;
    }
   /*  protected $appends =[
        'total',
    ];
    public function getTotalAttribute(){
        
            $total = $total + ($produto->preco * $this->quantidade);
        return $total;
    } */

}
