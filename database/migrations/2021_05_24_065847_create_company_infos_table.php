<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tel_no');
            $table->string('emergency_contact');
            $table->string('email');
            $table->string('fax');
            $table->string('website');
            $table->string('address');
            $table->string('bg_color');
            $table->string('map_icon');
            $table->string('photo');
            $table->string('sort_code');
            $table->string('acc_no');
            $table->string('bank');
            $table->string('company_nbr');
            $table->string('VAT_nbr');
            $table->string('IBAN');
            $table->string('BLC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_infos');
    }
}
