<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dob')->after("remember_token");
            $table->string('phone_no')->after("dob");
            $table->string('skill')->after("phone_no");
            $table->string('hobbies')->after("skill");
            $table->string('address')->after("hobbies");
            //
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
            $table->dropColumn('dob');
            $table->dropColumn('phone_no');
            $table->dropColumn('skill');
            $table->dropColumn('hobbies');
            $table->dropColumn('address');
            //
        });
    }
}
