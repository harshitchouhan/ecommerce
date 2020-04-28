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
            $table->bigIncrements('id');
            $table->integer('C_pid');
            $table->string('C_name');
            $table->string('C_detail', 1000);
            $table->string('C_image');
            $table->enum('C_status', ['1', '0']);
            $table->string('C_metatitle', 500);
            $table->string('C_metakeyword', 500);
            $table->string('C_metadescription', 1000);
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
