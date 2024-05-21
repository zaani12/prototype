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
        Schema::create('livrables', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('lien');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('nature_livrable_id')->nullable();
            $table->timestamps();

            $table->foreign('nature_livrable_id')->references('id')->on('nature_livrables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livrables');
    }
};
