<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginAtColumn extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('login_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->dateTime('login_at')->nullable();
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
            $table->dropColumn('login_at');
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('login_at');
        });
    }

}
