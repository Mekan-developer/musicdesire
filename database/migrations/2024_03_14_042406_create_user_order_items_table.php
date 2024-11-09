<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained(table: 'user_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('track_id')->constrained(table: 'track_items')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('user_order_items');
    }
}
