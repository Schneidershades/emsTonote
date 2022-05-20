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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('user_operator_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->integer('days')->nullable();
            $table->date('leave_start')->nullable();
            $table->date('leave_end')->nullable();
            $table->boolean('salary_deduction')->default(false);
            $table->decimal('salary_deduction_amount', 40, 2)->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('user_operator_id')->nullable();
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('leave_requests');
    }
};
