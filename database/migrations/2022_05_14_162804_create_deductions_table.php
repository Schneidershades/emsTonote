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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->bigInteger('deductable_id')->nullable();
            $table->string('deductable_type')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('unit')->nullable();
            $table->string('measure')->nullable();
            $table->string('frequency')->nullable();
            $table->date('period')->nullable();
            $table->float('value')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('deductions');
    }
};
