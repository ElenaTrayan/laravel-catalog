<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightRestrictionToBranchesOfDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches_of_delivery', function (Blueprint $table) {
            $table->boolean('weight_restriction')->nullable(); // есть ли ограничение по весу (до 30 кг)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches_of_delivery', function (Blueprint $table) {
            $table->dropColumn('weight_restriction');
        });
    }
}
