<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('request_information', function (Blueprint $table) {
            $table->id();
            $table->string('organization_or_individual_name');
            $table->string('contact_person');
            $table->date('Birthday');
            $table->string('contact_address_city');
            $table->string('contact_address_district');
            $table->string('contact_address_ward');
            $table->string('contact_address_street');
            $table->string('city');
            $table->string('district');
            $table->string('ward');
            $table->string('street');
            $table->string('phone_number');
            $table->string('email');
            $table->string('CDCD');
            $table->string('DayCDCD');
            $table->string('NameCDCD');
            $table->string('DirecrtCDCD');
            $table->string('plot_number');
            $table->string('sheet_number');
            $table->string('area_size');
            $table->json('coordinates')->nullable()->change();
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
       
        Schema::dropIfExists('request_information');
    }
};
