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
        Schema::create('to_do', function (Blueprint $table) {
            $table->id();
            $table->string('job_applied');
            $table->text('place')->nullable();
            $table->date('date_applied')->nullable();
            $table->enum('status', ['Draft', 'Applied', 'Interview Scheduled', 'Interviewed', 'Accepted', 'Rejected'])->default('draft');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_do');
    }
};
