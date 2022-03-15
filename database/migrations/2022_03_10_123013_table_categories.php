<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->bigInteger('prom_group_id');
            $table->string('prom_cat_adress'); 
            $table->string('prom_cat_1'); 
            $table->string('prom_cat_2'); 
            $table->string('prom_cat_3'); 
            $table->string('prom_cat_4'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('prom_group_id');
            $table->dropColumn('prom_cat_adress');
            $table->dropColumn('prom_cat_1');
            $table->dropColumn('prom_cat_2');
            $table->dropColumn('prom_cat_3');
            $table->dropColumn('prom_cat_4');
        });
    }
}
