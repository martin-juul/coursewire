<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_types', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->text('title');
            $table->text('slug')->unique();

            $table->text('short_name');

            $table->timestampsTz();
        });
        autogen_uuidv4('education_types');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_types');
    }
}
