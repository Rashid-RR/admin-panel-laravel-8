<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_masters', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->string('company_logo')->default('default.png');
            $table->text('address');
            $table->string('company_city');
            $table->string('company_state');
            $table->string('company_pin');
            $table->string('company_country');
            $table->string('company_phone');
            $table->string('company_email');
            $table->string('company_gst');

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
        Schema::dropIfExists('company_masters');
    }
}
