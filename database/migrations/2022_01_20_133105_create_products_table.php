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
            $table->string('name', 100);
            $table->string('name_ukr', 100);
            $table->string('keywords_', 1024);
            $table->string('keywords_ukr', 1024);
            $table->text('description');
            $table->text('description_ukr');
            $table->string('type');
            $table->float('price', 8, 2);
            $table->string('price_from');
            $table->string('currency');
            $table->string('measure_unit');
            $table->integer('min_order_units');
            $table->float('wholesale_price', 8, 2);
            $table->integer('min_wholesale_units');
            $table->integer('quantity');
            $table->string('image_ref');
            $table->float('weight', 8, 2);
            $table->integer('width');
            $table->integer('height');
            $table->integer('depth');
            $table->string('availability');
            $table->string('discount');
            $table->date('discount_begin_date');
            $table->date('discount_end_date');
            $table->string('label');
            $table->string('manufacturer');
            $table->string('country');
            $table->string('html_title');
            $table->string('html_title_ukr');
            $table->string('html_description');
            $table->string('html_description_ukr');
            $table->string('html_keywords');
            $table->string('html_keywords_ukr');
            $table->string('gifts');
            $table->string('accompany');
            $table->string('gifts_id');
            $table->string('accompany_id');
            $table->bigInteger('group_number');
            $table->string('group_name');
            $table->string('sub_ref');
            $table->integer('available_delivery');
            $table->string('delivery_term');
            $table->string('packing_type');
            $table->string('personal_marks');
            $table->string('product_url');
            $table->string('gtin_mark');
            $table->string('mpn_number');
            $table->string('product_id');
            $table->integer('unique_id');
            $table->string('sub_id');
            $table->string('group_id');
            $table->string('group_variations_id');
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
