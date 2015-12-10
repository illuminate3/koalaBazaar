<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCartCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wished_products', function (Blueprint $table) {
            $table->integer('count')->unsigned()->default(1);
        });

        Schema::table('check_outs', function (Blueprint $table) {
            $table->integer('count')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_outs', function (Blueprint $table) {
        $table->dropColumn('count');
    });
    }
}
