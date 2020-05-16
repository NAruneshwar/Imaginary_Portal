<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('u_id',5);
            $table->string('org_name',25);
            $table->year('fdate');
            $table->year('edate');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('past_histories');
    }
}
