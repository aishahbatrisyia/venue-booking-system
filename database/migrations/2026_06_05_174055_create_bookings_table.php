<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table): void {
            $table->id();
            $table->string('reference_no', 30)->nullable()->unique();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('venue_id')->constrained()->cascadeOnDelete();

            $table->string('contact_info', 20);
            $table->string('email');
            $table->string('society_name', 100)->nullable();
            $table->string('department_name', 100)->nullable();

            $table->string('event_title', 150);
            $table->string('organizer', 100);
            $table->string('category', 20)->default('student');

            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('pax');

            $table->string('status', 20)->default('pending')->index();
            $table->text('admin_remarks')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();

            $table->index(['venue_id', 'booking_date']);
            $table->index(['user_id', 'status']);
            $table->index(
                ['venue_id', 'booking_date', 'start_time', 'end_time'],
                'bookings_conflict_lookup_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};