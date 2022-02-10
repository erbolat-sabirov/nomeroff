<?php

use App\Models\CarService;
use App\Models\Washing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWashingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->enum('status', Washing::getStatusKeysList())->default(Washing::STATUS_NEW);
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreign('service_id')->references('id')->on('services')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('washings');
    }
}
