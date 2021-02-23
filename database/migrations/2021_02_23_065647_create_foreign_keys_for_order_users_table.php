<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForOrderUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_users', function (Blueprint $table) {
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('medical_id')->references('id')->on('medical')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_users', function (Blueprint $table){
            $table->dropForeign('order_users_buyer_id_foreign');
            $table->dropForeign('order_users_medical_id_foreign');
        });
    }
}
