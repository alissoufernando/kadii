<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTitleSubtitleImageLinkToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
        });
    }
}
