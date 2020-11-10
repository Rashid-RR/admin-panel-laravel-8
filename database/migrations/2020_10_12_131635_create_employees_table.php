<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName',30);
            $table->string('lastName',30);
            $table->string('gender')->default('M');
            $table->date('dob');
            $table->string('cnic',13)->unique();
            $table->string('employeeAddress');
            $table->string('city',70);
            $table->string('country',200);
            $table->string('postalCode',5);
            $table->string('homePhone');
            $table->string('workPhone');
            $table->string('emergencyContact');
            $table->string('emergencyPhone');
            $table->string('email',254)->unique();
            $table->string('employeeCode');
            $table->date('hireDate');
            $table->date('joinDate');
            $table->string('salary');
            $table->string('bankName')->nullable();
            $table->string('branchName')->nullable();
            $table->string('branchCode')->nullable();
            $table->string('accountTitle')->nullable();
            $table->string('accountNumber')->nullable();

            //FK 1.Department
            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            //FK 2.Designation
            $table->unsignedInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            //FK 3.Location
            $table->unsignedInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            //FK 4.Shift
            $table->unsignedInteger('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');

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
        Schema::dropIfExists('employees');
    }
}
