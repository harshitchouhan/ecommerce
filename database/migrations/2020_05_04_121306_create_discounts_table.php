<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dname');
            $table->integer('dcode');
            $table->integer('dvalue');
            $table->string('dtype');
            $table->integer('duses');
            $table->timestamp('dstartdate');
            $table->timestamp('dexpirydate');
            $table->enum('dactive', ['1', '0']);
            $table->enum('dbasis', ['1', '0']);
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
        Schema::dropIfExists('discounts');
    }
}
