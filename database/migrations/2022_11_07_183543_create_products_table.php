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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('height');
            $table->string('length');
            $table->string('width');
            $table->string('filling')->nullable();
            $table->string('coating')->nullable();
            $table->string('tabletop')->nullable();
            $table->string('material');
            $table->text('description');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->string('SKU')->nullable();
            $table->enum('stock_status', ['instock', 'outofstock']);
            $table->unsignedInteger('quantity')->default(4);
            $table->string('image')->nullable();
            $table->boolean('top_sales')->default(false);
            $table->enum('new_product', ['new', 'old'])->default('old');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('manufacturer_id')->unsigned()->nullable();
            $table->timestamps();
            $table->bigInteger('color_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
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
};
