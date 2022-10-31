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
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('in_stock')->default(0);
            $table->string('details')->nullable();
            $table->text('description');
            $table->string('product_code'); //product code
            $table->string('image')->default('default/no_image.jpg');
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('quantity')->default(0);
//            $table->string('shopping_cost');
            $table->string('category_id');
            $table->string('brand_id');
//            $table->tinyText('image_path');
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
};
