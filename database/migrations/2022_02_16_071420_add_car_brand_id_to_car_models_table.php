<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCarBrandIdToCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('car_models', 'car_brand_id')) {
            Schema::table('car_models', function (Blueprint $table) {
                $table->foreign('car_brand_id')->references('id')->on('car_brands')->cascadeOnDelete();
            });
        }else{
            Schema::table('car_models', function (Blueprint $table) {
                $table->unsignedBigInteger('car_brand_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('car_models', 'car_brand_id')) {
            Schema::table('car_models', function (Blueprint $table) {
                $table->dropColumn('car_brand_id');
            });
        }
    }
}
