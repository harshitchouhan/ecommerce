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
            $table->increments('id');
            $table->integer('Pcode');
            $table->integer('Pbrandid')->unsigned();;
            $table->integer('Pcategoryid')->unsigned();;
            $table->string('Pname');
            $table->string('Pdescription', 1000);
            $table->integer('PsellerId');
            $table->float('Pwholesaleprice');
            $table->float('Pretailprice');
            $table->float('Psaleprice');
            $table->enum('Pstatus', ['1', '0']);
            $table->string('Pimage1');
            $table->string('Pimage2');
            $table->string('Pimage3');
            $table->string('Pimage4');
            $table->string('Pimage5');
            $table->string('Pvideo');
            $table->string('Pmetatitle', 500);
            $table->string('Pmetakeyword', 500);
            $table->string('Pmetadescription', 1000);
            $table->integer('PrelatedProducts');
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
