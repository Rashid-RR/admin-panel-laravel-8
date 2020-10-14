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
            $table->string('cnic',13);
            $table->string('employeeAddress');
            $table->string('city',70);
            $table->string('country',100);
            $table->string('postalCode',5)->nullable();
            $table->string('homePhone')->nullable();
            $table->string('workPhone')->nullable();
            $table->string('emergencyContact')->nullable();
            $table->string('emergencyPhone')->nullable();
            $table->string('email',254);
            $table->string('employeeCode')->nullable();
            $table->date('hireDate')->nullable();
            $table->date('joinDate')->nullable();
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
            //FK 4.Salary Method
            $table->unsignedInteger('salaryMethod_id');
            $table->foreign('salaryMethod_id')->references('id')->on('salary_methods')->onDelete('cascade');

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
