<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_employees', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->nullable();
            $table->string('pay_fre')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('employe_time')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('date_app')->nullable();
            $table->string('ident_type')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('passport_c_code')->nullable();
            $table->string('id_number')->nullable();
            $table->string('email')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('acc_number')->nullable();
            $table->string('brance_code')->nullable();
            $table->string('acc_type')->nullable();
            $table->string('holder_rel')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('complex')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('code')->nullable();
            $table->string('same_as_residential')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('line3')->nullable();
            $table->string('codetwo')->nullable();
            $table->string('jobtitle')->nullable();
            $table->string('tax_number')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('new_employees');
    }
}
