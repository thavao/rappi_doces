<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id')->constrained();
            $table->foreignId('produto_id')->constrained();
            $table->date('datapedido');
            $table->decimal('valorunitariop', 10, 2)->unsigned();
            $table->integer('quantidade')->unsigned();
            $table->string('observacao',640);
            $table->enum('status', ['RE', 'PA', 'CA']);//RESERVADO, PAGO, CANCELADO
            $table->softDeletes();
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
        Schema::dropIfExists('pedidos');
    }
}
