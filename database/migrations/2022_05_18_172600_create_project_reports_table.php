<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_critical_path')->nullable();
            $table->boolean('is_continous')->nullable();
            $table->uuid('dependent_work_activity_id')->nullable()->constrained('projects')->cascadeOnUpdate()->nullOnDelete();
            $table->uuid('blocked_work_activity_id')->nullable()->constrained('projects')->cascadeOnUpdate()->nullOnDelete();
            $table->string('status')->nullable();
            $table->boolean('is_blocked')->nullable();
            $table->boolean('is_delayed')->nullable();
            $table->boolean('is_completed')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_reports');
    }
};
