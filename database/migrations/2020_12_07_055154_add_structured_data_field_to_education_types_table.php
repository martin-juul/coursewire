<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStructuredDataFieldToEducationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education_types', function (Blueprint $table) {
            $table->text('time_to_complete')->nullable();
            $table->text('credential_awarded')->nullable();
            $table->text('program_prerequisites')->nullable();
            $table->jsonb('day_of_week')->nullable();
            $table->text('term_duration')->nullable();
            $table->integer('terms_per_year')->nullable();
            $table->text('educational_program_mode')->nullable();
            $table->text('financial_aid_eligible')->nullable();
            $table->text('training_salary')->nullable();
            $table->text('completion_salary')->nullable();
            $table->text('program_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('education_types', function (Blueprint $table) {
            $table->dropColumn([
                'time_to_complete',
                'credential_awarded',
                'program_prerequisites',
                'day_of_week',
                'term_duration',
                'educational_program_mode',
                'financial_aid_eligible',
                'training_salary',
                'completion_salary',
                'program_type'
            ]);
        });
    }
}
