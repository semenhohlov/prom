<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccordanceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accordance_categories', function (Blueprint $table) {
            $table->id();
            $table->string('supplier');
            $table->bigInteger('group_number');
            $table->bigInteger('group_id');
            $table->bigInteger('group_parent_id')->nullable();
            $table->string('group_name');
            $table->string('group_prom_name');
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
        Schema::dropIfExists('accordance_categories');
    }
}
