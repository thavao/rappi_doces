<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
    }
}
