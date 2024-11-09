<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_items', function (Blueprint $table) {
            $table->id();
            $table->integer('category');
            $table->integer('lang');
            $table->boolean('lyrics');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('image')->nullable();
            $table->string('file');
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
        Schema::dropIfExists('track_items');
    }
}
