<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('customer_id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('set null');
        });
        Schema::table('rankings', function (Blueprint $table) {
            $table->dropColumn('customer_id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete('set null');
        });
        Schema::table('rankings', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete('set null');
        });
    }
}
