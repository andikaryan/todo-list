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
            $table->string('job_application');
            $table->string('place');
            $table->date('date_of_application');
            $table->enum('status', ['draft', 'applied', 'interview scheduled', 'interviewed', 'accepted', 'rejected'])->default('draft');
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
