<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('track_item_id')->constrained(table: 'track_items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('location_item_id')->constrained(table: 'location_items')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('blocked_before');
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
        Schema::dropIfExists('track_blocks');
    }
}
