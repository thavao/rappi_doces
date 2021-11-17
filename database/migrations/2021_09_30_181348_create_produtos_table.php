<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->decimal('preco', 8, 2)->unsigned();
            $table->text('descricao');
            $table->integer('qtdestoque')->unsigned();
            $table->string('NomeProduto', 128);
            $table->foreignId('Fornecedor_id')->constrained();
            $table->integer('Estoquemin')->unsigned();
            $table->string('imagem');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
