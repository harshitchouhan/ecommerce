<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sname');
            $table->string('semail');
            $table->string('simage')->nullable();
            $table->text('saddressline1');
            $table->text('saddressline2')->nullable();
            $table->integer('scity');
            $table->integer('sstate');
            $table->string('szipcode');
            $table->text('sgoogleid')->nullable();
            $table->text('sfaceboookid')->nullable();
            $table->text('slinkedinid')->nullable();
            $table->enum('sstatus', ['1', '0']);
            $table->string('sphone', 15);
            $table->string('salternatephone', 15)->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
