<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_comptes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('compte_id')->nullable();
            $table->foreignId('compte_tiers_id')->nullable();
            $table->bigInteger('entree')->nullable();
            $table->bigInteger('sortie')->nullable();
            $table->bigInteger('solde');
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
        Schema::dropIfExists('journal_comptes');
    }
}
