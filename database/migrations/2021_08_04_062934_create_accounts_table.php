<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('date',100);
            $table->string("account",200);
            $table->bigInteger("header_id");
            $table->bigInteger("detail_id");
            $table->string('remarks',100);
            $table->text('Attachment')->nullable();
            $table->bigInteger('cash');
            $table->string('paid',200);
            $table->bigInteger('total');
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
        Schema::dropIfExists('accounts');
    }
}
