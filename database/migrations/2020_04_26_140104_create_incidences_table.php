<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->nullable()->constrained()->onDelete('cascade');
            $table->date('day');
            $table->bigInteger('tested')->nullable();
            $table->bigInteger('positive')->nullable();
            $table->bigInteger('recovered')->nullable();
            $table->bigInteger('relapsed')->nullable();
            $table->bigInteger('transfered')->nullable();
            $table->bigInteger('evacuated')->nullable();
            $table->bigInteger('critical')->nullable();
            $table->bigInteger('died')->nullable();
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
        Schema::dropIfExists('incidences');
    }
}
