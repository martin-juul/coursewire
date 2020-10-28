<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationStudentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_student_type', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('education_id');
            $table->foreign('education_id')
                ->references('id')->on('education')
                ->cascadeOnDelete();

            $table->uuid('student_type_id');
            $table->foreign('student_type_id')
                ->references('id')->on('student_types')
                ->cascadeOnDelete();

            $table->timestampsTz();
        });
        autogen_uuidv4('education_student_type');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_student_type');
    }
}
