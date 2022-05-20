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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('slug')->nullable();
            $table->string('sex')->nullable();
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('profession')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('designation_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('department_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('qualification')->nullable();
            $table->string('postion')->nullable();
            $table->boolean('confirmed')->default(true);
            $table->string('pension_managers')->nullable();
            $table->string('initial_appointment_date')->nullable();
            $table->string('present_appointment_date')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('current_location')->nullable();
            $table->string('previous_location')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('number_of_dependants')->default(0);
            $table->string('residential_address')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('genotype')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('state_deformity')->nullable();
            $table->integer('signature_approvals')->default(0);
            $table->float('base_salary')->default(0);
            $table->string('payment_currency')->default('NGN');
            $table->string('system_role')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
