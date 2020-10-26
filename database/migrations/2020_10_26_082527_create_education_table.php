<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->text('title');
            $table->text('slug')->unique();

            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $table->text('overview')->nullable();
            $table->text('about')->nullable();

            $table->text('version');

            $table->timestampsTz();
        });
        autogen_uuidv4('education');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
