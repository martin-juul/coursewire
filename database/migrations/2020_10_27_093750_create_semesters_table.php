<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('education_id');
            $table->foreign('education_id')
                ->references('id')->on('education')
                ->cascadeOnDelete();

            $table->uuid('student_type_id');
            $table->foreign('student_type_id')
                ->references('id')->on('student_types')
                ->cascadeOnDelete();

            $table->bigInteger('semester');

            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->nullOnDelete();

            $table->timestampsTz();

            $table->unique(['education_id', 'student_type_id', 'semester']);
        });
        autogen_uuidv4('semesters');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
}
