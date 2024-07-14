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
        Schema::create('random_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matched_ids')
                ->constrained('matched_users')
                ->onDelete('cascade');
            $table->foreignId('from_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('to_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('random_messages');
    }
};
