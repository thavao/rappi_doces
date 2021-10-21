<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fotop extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
