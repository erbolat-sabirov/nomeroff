<?php

use App\Models\Washing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWashingTimesTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('washing_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('washing_id');
            $table->time('time');
            $table->enum('status', Washing::getStatusKeysList())->default(Washing::STATUS_NEW);


            $table->foreign('washing_id')->references('id')->on('washings')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('washing_times');
    }
}
