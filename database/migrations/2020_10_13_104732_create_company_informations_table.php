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
            $table->id();

            $table->bigInteger('companyType_id')->unsigned();
            $table->foreign('companyType_id')->references('id')->on('company_types')->onDelete('cascade');

            $table->string('companyTitle','50');
            $table->string('websiteAddress')->nullable();
            $table->string('email')->unique();
            $table->string('employeeRange');

            $table->bigInteger('salaryMethod_id')->unsigned();
            $table->foreign('salaryMethod_id')->references('id')->on('salary_methods')->onDelete('cascade');

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
