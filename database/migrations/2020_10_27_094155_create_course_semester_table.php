<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_semester', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('course_id');
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->cascadeOnDelete();

            $table->uuid('semester_id')->nullable();
            $table->foreign('semester_id')
                ->references('id')->on('semesters')
                ->nullOnDelete();

            $table->bigInteger('duration');

            $table->timestampsTz();
        });
        autogen_uuidv4('course_semester');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_semester');
    }
}
