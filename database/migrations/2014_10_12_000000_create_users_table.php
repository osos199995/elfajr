<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->date('date_hiring');
            $table->integer('salary');
            $table->text('employee_national_id');
            $table->string('email')->unique();
            $table->text('phone')->unique();
            $table->integer('role_id');
            $table->integer('department_id');
            $table->text('image');
            $table->text('address');
            $table->date('birth_date');
            $table->text('job_title');
            $table->text('cv');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
