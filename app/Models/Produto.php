<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //define um relacionamento entre produto e fornecedor
    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id'); 
    }
    public function pedido(){
        return $this->hasMany(Pedido::class, 'pedido_id'); 
    }
    public function fotop(){
        return $this->hasMany(Fotop::class, 'fotop_id'); 
    }
}
