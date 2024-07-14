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
        Schema::create('matched_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_primary')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('user_id_secondary')
                ->constrained('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matched_users');
    }
};
