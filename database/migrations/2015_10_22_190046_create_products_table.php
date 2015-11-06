<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->integer("supplier_id")->unsigned();
            $table->string("title");
            $table->text("description");
            $table->boolean("is_active");
            $table->string("image");
            $table->double("price",10,8);
            $table->string("current_unit");
            $table->foreign("supplier_id")->references("id")->on("suppliers");
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
        Schema::drop('products');
    }
}
