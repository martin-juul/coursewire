<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrixTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nova_pending_trix_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('draft_id')->index();
            $table->text('attachment');
            $table->text('disk');
            $table->timestampsTz();
        });

        Schema::create('nova_trix_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('attachable_type');
            $table->uuid('attachable_id');
            $table->text('attachment');
            $table->text('disk');
            $table->text('url')->index();
            $table->timestampsTz();

            $table->index(['attachable_type', 'attachable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trix_tables');
    }
}
