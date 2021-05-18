<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_codess', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_code');
            $table->unsignedBigInteger('zone_id');
            $table->timestamps();

            $table->foreign('zone_id')->references('id')->on('zones');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_codess');
    }
}
