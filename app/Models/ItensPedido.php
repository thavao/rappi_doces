<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'pedido_id',
        'produto_id',
        'quantidade',
        'preco',

    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'pedido_id', 'id');
    }
    public function produto(){
        return $this->hasMany(Produto::class, 'produto_id', 'id');
    }
}
