<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('creditos', function (Blueprint $table) {
    $table->id();

    $table->foreignId('cliente_id')
          ->constrained()
          ->onDelete('cascade');

    $table->integer('tipo_producto');

    $table->decimal('valor_credito', 12, 2);

    $table->integer('plazo');

    $table->decimal('interes', 12, 2);

    $table->decimal('total_pagar', 12, 2);

    $table->decimal('valor_cuota', 12, 2);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditos');
    }
};
