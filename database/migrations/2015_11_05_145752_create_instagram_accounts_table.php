<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagram_accounts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('instagramable_id')->unsigned()->nullable();
            $table->string('instagramable_type');
            $table->string('instagram_id');
            $table->string("access_token");
            $table->string("username");
            $table->string("full_name");
            $table->text("bio");
            $table->string("website");
            $table->string("profile_picture");
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
        Schema::drop('instagram_accounts');
    }

}