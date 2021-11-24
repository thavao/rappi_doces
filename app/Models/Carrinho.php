<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrinho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'id',
        'produto_id',
        'pedido_id',
        'status',
        'valor',
        'cupom_desconto_id',
        

    ];

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }

}
