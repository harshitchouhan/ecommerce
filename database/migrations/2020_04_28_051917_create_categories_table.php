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
            $table->increments('id');
            $table->integer('Cpid');
            $table->string('Cname');
            $table->string('Cdetail', 1000);
            $table->string('Cimage')->nullable();
            $table->enum('Cstatus', ['1', '0']);
            $table->string('Cmetatitle', 500);
            $table->string('Cmetakeyword', 500);
            $table->string('Cmetadescription', 1000);
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
