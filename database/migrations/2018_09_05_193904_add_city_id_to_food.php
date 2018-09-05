<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityIdToFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function(Blueprint $table) {
            $table->unsignedInteger('city_id')->nullable()->after('title');
            $table->foreign('city_id')->references('id')->on('cities');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function(Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');

        });
    }
}
