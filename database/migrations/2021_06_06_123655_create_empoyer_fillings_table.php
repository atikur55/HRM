<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpoyerFillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empoyer_fillings', function (Blueprint $table) {
            $table->id();
            $table->string('pay_number')->nullable();
            $table->string('uif_number')->nullable();
            $table->string('c_register')->nullable();
            $table->string('same_as_residential')->nullable();
            $table->string('lin1')->nullable();
            $table->string('lin2')->nullable();
            $table->string('lin3')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('empoyer_fillings');
    }
}
