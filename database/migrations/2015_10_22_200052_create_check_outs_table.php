<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_outs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer("supplier_id")->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('customer_email');
            $table->text("description");
            $table->string('product_title');
            $table->double('product_price',10,8);
            $table->string("image");
            $table->double("price",10,8);
            $table->string("current_unit");
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
        Schema::drop('check_outs');
    }
}
