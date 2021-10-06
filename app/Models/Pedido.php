<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
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
}
