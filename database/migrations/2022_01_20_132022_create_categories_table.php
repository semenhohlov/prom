<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_number');
            $table->string('group_name');
            $table->string('group_name_ukr');
            $table->bigInteger('group_id');
            $table->bigInteger('group_parent_number');
            $table->bigInteger('group_parent_id');
            $table->string('group_html_title');
            $table->string('group_html_title_ukr');
            $table->string('group_html_description');
            $table->string('group_html_description_ukr');
            $table->string('group_html_keywords');
            $table->string('group_html_keywords_ukr');
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
        Schema::dropIfExists('categories');
    }
}
