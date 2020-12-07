<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table): void {
            $table->uuid('id')->primary();

            $table->text('group')->index();
            $table->text('name');
            $table->boolean('locked');
            $table->jsonb('payload');

            $table->timestampsTz();
        });
        autogen_uuidv4('settings');
    }
}
