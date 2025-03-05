<?php

use App\Models\Employer;
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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employer::class)->constrained('employers')->onDelete('cascade');
            $table->string('job_title');
            $table->enum('employment_type', ['any', 'part-time', 'full-time', 'gig']);
            $table->text('job_description');
            $table->decimal('salary', 10, 2);
            $table->integer('desired_hours_per_week');

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->integer('hits')->default(0);
            $table->integer('applicants')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
