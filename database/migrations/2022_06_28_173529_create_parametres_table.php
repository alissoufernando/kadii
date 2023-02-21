<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('phone');
            $table->string('email1');
            $table->string('map');
            $table->string('email2');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('twitter');
            $table->string('google');
            $table->string('instagram');
            $table->string('address');
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
        Schema::dropIfExists('parametres');
    }
}
