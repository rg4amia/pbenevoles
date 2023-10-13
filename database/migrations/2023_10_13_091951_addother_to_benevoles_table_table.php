<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benevoles', function (Blueprint $table) {
            $table->string('preciser_autre_niveau_scolaire')->nullable();
            $table->string('preciser_autre_diplome')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benevoles_table', function (Blueprint $table) {
            //
        });
    }
};
