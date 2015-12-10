<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentToCheckouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_outs', function (Blueprint $table) {
            $table->integer('payment_id')->unsigned()->nullable();
            $table->boolean('confirmed_by_supplier')->default(false);
            $table->boolean('received_by_customer')->default(false);
            $table->foreign("payment_id")->references("id")->on("payments")->onDelete('set null');
            $table->integer('receiver_address_id')->unsigned();
            $table->foreign('receiver_address_id')->references('id')->on('addresses');
            $table->integer('bill_address_id')->unsigned()->nullable();
            $table->foreign('bill_address_id')->references('id')->on('addresses');

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
            $table->dropColumn('payment_id');
            $table->dropColumn('confirmed_by_supplier');
            $table->dropColumn('received_by_customer');
            $table->dropColumn('receiver_address_id');
            $table->dropColumn('bill_address_id');
        });
    }
}
