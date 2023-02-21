<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('normal_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('sku');
            $table->enum('status_stock', ['instock', 'outofstock']);
            $table->boolean('featured');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('quantity_alert');
            $table->boolean('status');
            $table->foreignId('categorie_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
