<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_informations', function (Blueprint $table) {

            $table->increments('id');

            $table->bigInteger('companyTypeId')->unsigned();
            $table->foreign('companyTypeId')->references('id')->on('company_types')->onDelete('cascade');

            $table->string('companyTitle','50');
            $table->string('websiteAddress')->nullable();
            $table->string('email')->unique();
            $table->string('employeeRange');

            $table->bigInteger('salaryMethodId')->unsigned();
            $table->foreign('salaryMethodId')->references('id')->on('salary_methods')->onDelete('cascade');

            $table->string('companyLogo')->nullable();
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
        Schema::dropIfExists('company_informations');
    }
}
