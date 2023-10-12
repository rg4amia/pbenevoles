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
        Schema::create('association_benevoles', function (Blueprint $table) {
            $table->uuid('id');

            $table->string('matricule')->unique()->nullable();

            $table->longText('nom')->nullable();
            $table->string('numero_enregistrement')->nullable();
            $table->string('numero_creation')->nullable();
            $table->string('statut_juridique')->nullable();

            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');

            $table->string('adresse_postale')->nullable();

            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id')->references('id')->on('regions');

            $table->string('email')->unique()->nullable();
            $table->string('site_web')->unique()->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('fax')->unique()->nullable();

            $table->string('nom_repondant')->nullable();
            $table->string('prenoms_repondant')->nullable();

            $table->string('fonction_repondant_org')->nullable();
            $table->string('telephone_repondant')->unique()->nullable();
            $table->string('email_repondant')->unique()->nullable();


            $table->unsignedBigInteger('domaine_intervention_id');
            $table->foreign('domaine_intervention_id')->references('id')->on('domaine_interventions');

            $table->unsignedBigInteger('population_cible_id');
            $table->foreign('population_cible_id')->references('id')->on('population_cibles');

            $table->integer('effectif_personnel')->nullable();
            $table->integer('effectif_homme')->nullable();
            $table->integer('effectif_femme')->nullable();
            $table->integer('effectif_salaries')->nullable();
            $table->integer('effectif_contractuels')->nullable();
            $table->integer('effectif_benevoles')->nullable();

            $table->integer('montant_budget_anneeencour')->nullable();
            $table->integer('montant_budget_2019')->nullable();
            $table->integer('montant_budget_2018')->nullable();
            $table->integer('montant_budget_2017')->nullable();

            $table->boolean('status_autreinfo')->default(false);
            $table->longText('preciser_autreinfo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('association_benevoles');
    }
};
