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
        Schema::table('actions', function (Blueprint $table) {
            $table->string('nom');
            $table->unsignedBigInteger('controller_id');
            $table->unsignedBigInteger('permission_id')->unique(); // Added unique constraint          
            $table->foreign('controller_id')->references('id')->on('controllers')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade'); // Added foreign key for permission
            $table->foreignId('parent_action_id')->nullable()->constrained('actions')->onDelete('cascade'); // Self-referential relationship
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropForeign(['controller_id']);
            $table->dropColumn('controller_id');
            $table->dropColumn('nom');
        });
    }
};
