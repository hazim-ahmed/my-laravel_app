<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('job_title_id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->date('hired_at');
            $table->timestamps();

            $table->foreign('job_title_id')
                ->references('id')->on('job_titles')
                ->onDelete('restrict');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
