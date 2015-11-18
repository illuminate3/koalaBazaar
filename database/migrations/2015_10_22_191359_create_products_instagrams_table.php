<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsInstagramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_instagrams', function(Blueprint $table) {
            $table->integer("product_id")->unsigned();
            $table->string('id');
            $table->string("url");
            $table->string("image_url");
            $table->text("caption")->nullable();
            $table->timestamp("created_on_instagram");
            $table->unique('id');
            $table->foreign("product_id")->references("id")->on("products");
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
        Schema::drop('products_instagrams');
    }
}
