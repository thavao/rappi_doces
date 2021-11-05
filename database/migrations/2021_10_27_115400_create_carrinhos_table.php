<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained();
            $table->foreignId('pedido_id')->constrained();
            $table->enum('status', ['RE', 'PA', 'CA']);//RESERVADO, PAGO, CANCELADO
            $table->decimal('valor', 8, 2)->default(0);
            $table->decimal('desconto', 8, 2)->default(0);
            $table->foreignId('cupom_desconto_id')->nullable()->constrained();

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
        Schema::dropIfExists('carrinhos');
    }
}
