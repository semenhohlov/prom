<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code', 25);
            $table->string('name');
            $table->string('name_ukr');
            $table->string('keywords', 1024);
            $table->string('keywords_ukr', 1024);
            $table->text('description');
            $table->text('description_ukr');
            $table->string('type');
            $table->float('price', 8, 2);
            $table->string('currency');
            $table->string('measure_unit');
            $table->integer('min_order_units');
            $table->float('wholesale_price', 8, 2);
            $table->integer('min_wholesale_units');
            $table->text('image_ref');
            $table->string('availability');
            $table->integer('quantity');
            $table->bigInteger('group_number');
            $table->string('group_name');
            $table->string('sub_ref');
            $table->integer('available_delivery');
            $table->string('delivery_term');
            $table->string('packing_type');
            $table->string('packing_type_ukr');
            $table->integer('unique_id');
            $table->string('product_id');
            $table->string('sub_id');
            $table->string('group_id');
            $table->string('manufacturer');
            $table->string('country');
            $table->string('discount');
            $table->string('group_variations_id');
            $table->string('personal_marks');
            $table->string('product_url');
            $table->string('discount_begin_date');
            $table->string('discount_end_date');
            $table->string('price_from');
            $table->string('label');
            $table->string('html_title');
            $table->string('html_title_ukr');
            $table->string('html_description');
            $table->string('html_description_ukr');
            $table->string('html_keywords');
            $table->string('html_keywords_ukr');
            $table->text('gifts');
            $table->text('accompany');
            $table->text('gifts_id');
            $table->text('accompany_id');
            $table->float('weight', 8, 2);
            $table->integer('width');
            $table->integer('height');
            $table->integer('length');
            $table->string('gtin_mark');
            $table->string('mpn_number');            
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
        Schema::dropIfExists('products');
    }
}
