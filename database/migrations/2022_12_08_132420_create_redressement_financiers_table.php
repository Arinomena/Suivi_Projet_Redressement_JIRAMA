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
        Schema::create('redressement_financiers', function (Blueprint $table) {
            $table->id();
            $table->string('Employee')->nullable();
            $table->text('Action')->nullable();
            $table->text('Situation_actuelle')->nullable();
            $table->double('Budget')->nullable();
            $table->string('Unite')->nullable();
            $table->string('Pourcentage_avancement')->nullable();
            $table->double('Depense',8,2)->nullable();
            $table->double('Fin2022')->nullable();
            $table->double('Juin2022')->nullable();
            $table->double('Fin2023')->nullable();
            $table->text('Resultat_Attendu')->nullable();
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
        Schema::dropIfExists('redressement_financiers');
    }
};
