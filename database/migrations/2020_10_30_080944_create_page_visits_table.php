<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->text('primary_key');
            $table->text('secondary_key')->nullable();

            $table->bigInteger('score');

            $table->jsonb('list')->nullable();

            $table->timestampTz('expired_at')->nullable();
            $table->timestampsTz();

            $table->unique(['primary_key', 'secondary_key']);
        });
        autogen_uuidv4('page_visits');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_visits');
    }
}
