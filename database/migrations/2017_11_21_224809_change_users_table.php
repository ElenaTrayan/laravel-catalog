<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role')->default(3)->after('id'); //администратор, модератор или пользователь
            $table->boolean('is_active')->default(0)->after('email');
            $table->boolean('is_banned')->default(0)->after('is_active');
            $table->boolean('is_online')->default(0)->after('is_banned');
            $table->string('ip')->nullable();
            $table->timestamp('last_activity')->nullable()->after('is_online');
            $table->string('avatar')->nullable()->after('last_activity');
            $table->string('activation_code')->nullable();
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
            $table->dropColumn('role');
            $table->dropColumn('is_active');
            $table->dropColumn('is_banned');
            $table->dropColumn('is_online');
            $table->dropColumn('last_activity');
            $table->dropColumn('avatar');
            $table->dropColumn('activation_code');
        });
    }
}
