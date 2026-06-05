<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 150);
            $table->string('location', 150);
            $table->unsignedInteger('seat_capacity');
            $table->string('venue_type', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('status', 30)->default('available')->index();
            $table->timestamps();

            $table->index(['location', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};