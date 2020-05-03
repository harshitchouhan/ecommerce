<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cname');
            $table->string('cemail');
            $table->string('cimage')->nullable();
            $table->text('caddressline1');
            $table->text('caddressline2')->nullable();
            $table->string('ccity');
            $table->string('cstate');
            $table->string('czipcode');
            $table->text('cgoogleid')->nullable();
            $table->text('cfaceboookid')->nullable();
            $table->text('clinkedinid')->nullable();
            $table->enum('cstatus', ['1', '0']);
            $table->string('cphone', 15);
            $table->string('calternatephone', 15)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
