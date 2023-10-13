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
            $table->boolean('do_education_formation')->default(false);
            $table->boolean('do_sante_communautaire')->default(false);
            $table->boolean('do_assainissement_environnement')->default(false);
            $table->boolean('do_promotion_droits_humains')->default(false);
            $table->boolean('do_agriculture')->default(false);
            $table->boolean('do_appui_aux_organisation')->default(false);
            $table->boolean('do_developpement_communauteire')->default(false);
            $table->boolean('do_autre')->default(false);

            $table->boolean('pop_population_generale')->default(false);
            $table->boolean('pop_homme')->default(false);
            $table->boolean('pop_femme')->default(false);
            $table->boolean('pop_jeunes')->default(false);
            $table->boolean('pop_enfants')->default(false);
            $table->boolean('pop_personne_agees')->default(false);
            $table->boolean('pop_personne_vivant_avec_handicap')->default(false);
            $table->boolean('pop_autre')->default(false);
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
