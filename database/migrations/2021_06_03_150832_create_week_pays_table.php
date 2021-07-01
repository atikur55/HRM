<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_pays', function (Blueprint $table) {
            $table->id();
            $table->string('colors')->nullable();
            $table->string('wdays')->nullable();
            $table->string('weekDate')->nullable();
            $table->string('e_w_date')->nullable();
            $table->string('e_w_f_date')->nullable();
            $table->string('month_fifteen')->nullable();
            $table->string('month_f_interm_day')->nullable();
            $table->string('half_month_date')->nullable();
            $table->string('month_end_v')->nullable();
            $table->string('month_end_day')->nullable();
            $table->string('month_end_date')->nullable();
            $table->string('t_l_d')->nullable();
            $table->string('t_m_d')->nullable();
            $table->string('twice_month_date')->nullable();
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
        Schema::dropIfExists('week_pays');
    }
}
