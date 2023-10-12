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
        Schema::create('benevoles', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('matricule')->unique()->nullable();
            $table->string('photoidentite')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenoms')->nullable();
            $table->date('datenaissance')->nullable(); // Vous pouvez saisir comme cet exemple date : Année-Mois-Jour ce qui donne 2023-04-07

            $table->unsignedBigInteger('lieu_naissance_id');
            $table->foreign('lieu_naissance_id')->references('id')->on('communes');

            $table->unsignedBigInteger('sexe_id');
            $table->foreign('sexe_id')->references('id')->on('sexes');

            $table->unsignedBigInteger('nationalite_id');
            $table->foreign('nationalite_id')->references('id')->on('nationalites');

            $table->string('telephone')->unique();
            $table->string('telephone_autre')->unique();

            $table->unsignedBigInteger('type_piece_id');
            $table->foreign('type_piece_id')->references('id')->on('type_pieces');

            $table->string('autre_typepiece')->nullable();

            $table->string('numero_piece')->unique()->nullable();

            $table->unsignedBigInteger('situation_matrimoniale_id');
            $table->foreign('situation_matrimoniale_id')->references('id')->on('situation_matrimoniales');

            $table->unsignedBigInteger('lieu_residence_id');
            $table->foreign('lieu_residence_id')->references('id')->on('communes');

            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');

            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');

            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id')->references('id')->on('departements');

            $table->string('sous_prefecture')->nullable();

            $table->boolean('situation_handicap')->default(false);
            $table->string('preciser_type_handicap')->nullable();

            $table->boolean('scolarise')->default(false);
            $table->string('niveau_scolaire')->nullable();
            $table->string('preciser_niveau_scolaire')->nullable();

            $table->unsignedBigInteger('niveau_scolaire_id');
            $table->foreign('niveau_scolaire_id')->references('id')->on('niveau_scolaires');

            $table->unsignedBigInteger('diplome_id');
            $table->foreign('diplome_id')->references('id')->on('diplomes');
            $table->string('preciser_diplome')->nullable();

            $table->unsignedBigInteger('situation_professionel_id');
            $table->foreign('situation_professionel_id')->references('id')->on('situation_professionels');

            $table->string('preciser_travail')->nullable();

            $table->boolean('membre_association')->default(false);
            $table->string('preciser_association')->nullable();
            $table->string('domaine_intervention_asso')->nullable();

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
        Schema::dropIfExists('benevoles');
    }
};
