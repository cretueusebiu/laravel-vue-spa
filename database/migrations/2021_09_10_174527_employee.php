<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
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
            $table->string("name", 120);
            $table->string("email", 120);
            $table->string("phone", 20)->nullable();
            $table->enum("gender", ["male", "female", "other"]);
            $table->string("address");
            $table->string("city");
            $table->string("province");
            $table->string("comments");
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
        //
    }
}
