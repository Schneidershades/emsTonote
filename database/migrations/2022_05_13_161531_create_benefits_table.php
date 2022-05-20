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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->bigInteger('benefitable_id')->nullable();
            $table->string('benefitable_type')->nullable();
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
        Schema::dropIfExists('benefits');
    }
};
