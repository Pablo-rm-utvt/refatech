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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->text('descripcion');
            $table->float('precio', 8, 2);
            $table->integer('stock');
            $table->boolean('disponible')->default(true);
            $table->foreignId('proveedor_id')->constrained('proveedor')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
