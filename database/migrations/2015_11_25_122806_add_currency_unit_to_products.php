<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCurrencyUnitToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('current_unit');
            $table->integer('currency_unit_id')->unsigned()->nullable();
            $table->foreign("currency_unit_id")->references("id")->on("currency_units")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('currency_unit_id');
            $table->integer('current_unit')->unsigned()->nullable();
            $table->foreign("currency_unit_id")->references("id")->on("currency_units")->onDelete('set null');
        });
    }
}
