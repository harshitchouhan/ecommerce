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
            $table->bigIncrements('id');
            $table->integer('p_code');
            $table->integer('p_brandid');
            $table->integer('p_categoryid');
            $table->string('p_name');
            $table->string('p_description', 1000);
            $table->float('p_wholesaleprice');
            $table->float('p_retailprice');
            $table->float('p_saleprice');
            $table->enum('p_status', ['1', '0']);
            $table->string('p_image1');
            $table->string('p_image2');
            $table->string('p_image3');
            $table->string('p_image4');
            $table->string('p_image5');
            $table->string('p_video');
            $table->string('p_metatitle', 500);
            $table->string('p_metakeyword', 500);
            $table->string('p_metadescription', 1000);
            $table->integer('p_relatedProducts');
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
        Schema::dropIfExists('porducts');
    }
}
