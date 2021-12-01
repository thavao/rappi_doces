<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreignId('produto_id');
            $table->decimal('preco', 10, 2)->unsigned();
            $table->integer('quantidade')->unsigned();
            $table->enum('status', ['RE', 'PA', 'CA']);//RESERVADO, PAGO, CANCELADO



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_pedidos');
    }
}
