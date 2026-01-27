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
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // commission, alert, info
            $table->string('title')->nullable();
            $table->text('message');
            $table->decimal('amount', 15, 2)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            // 🔹 Índices útiles
            $table->index(['user_id', 'type', 'active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_messages');
    }
};
