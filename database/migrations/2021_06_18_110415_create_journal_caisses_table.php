<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_caisses', function (Blueprint $table) {
            $table->id();
            $table->string('description_operation');
            $table->bigInteger('entree')->nullable();
            $table->bigInteger('sortie')->nullable();
            $table->bigInteger('montant_operation');
            $table->foreignId('compte_tiers_id')->nullable();
            $table->string('comptes');

            $table->bigInteger('solde');
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_caisses');
    }
}
