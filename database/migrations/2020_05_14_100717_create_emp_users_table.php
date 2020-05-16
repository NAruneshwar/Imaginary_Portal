<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_users', function (Blueprint $table) {
            $table->bigIncrements('u_id');
            $table->string('name',25);
            $table->string('jobtitle',25);
            $table->string('org_name',25);
            $table->year('fdate');
            $table->string('img_path',100);

            $table->index('u_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_users');
    }
}
