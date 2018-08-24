<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersNullableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('dob')->nullable()->change();
            $table->string('phone_no')->nullable()->change();
            $table->string('skill')->nullable()->change();
            $table->string('hobbies')->nullable()->change();
            $table->string('address')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dob')->nullable(false)->change();
            $table->string('phone_no')->nullable(false)->change();
            $table->string('skill')->nullable(false)->change();
            $table->string('hobbies')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            //
        });
    }
}
