<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastScannedCommentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_instagrams', function (Blueprint $table) {
            $table->string('last_scanned_comment')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_instagrams', function (Blueprint $table) {
            $table->drop('last_scanned_comment');
        });
    }
}
