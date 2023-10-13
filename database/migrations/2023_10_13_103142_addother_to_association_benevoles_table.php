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
        Schema::table('association_benevoles', function (Blueprint $table) {
            $table->string('pop_preciser_autre')->nullable();
            $table->string('do_preciser_autre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('association_benevoles', function (Blueprint $table) {
            //
        });
    }
};
