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
      	Schema::create('productos', function (Blueprint $table) {
   		$table->id();
		$table->string('nombre', 150);
    		$table->string('sku', 50)->unique();
    		$table->string('categoria', 100);
    		$table->decimal('precio', 10, 2);
    		$table->integer('stock');
    		$table->boolean('activo')->default(true);
    		$table->timestamp('fecha_registro')->useCurrent();
    		$table->timestamps();
	});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
