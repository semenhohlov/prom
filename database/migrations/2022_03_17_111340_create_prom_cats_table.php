<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prom_cats', function (Blueprint $table) {
            $table->id();
            $table->string('category_1')->nullable();
            $table->string('category_2')->nullable();
            $table->string('category_3')->nullable();
            $table->string('category_4')->nullable();
            $table->string('category_url');
            $table->bigInteger('category_id');
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
        Schema::dropIfExists('prom_cats');
    }
}
