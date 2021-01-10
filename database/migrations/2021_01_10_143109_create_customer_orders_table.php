<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('instrument_id')->nullable();
            $table->integer('type')->nullable()->comment('1=>intraday 2=>cnc');
            $table->double('price')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->date('ordered_at')->nullable();
            $table->date('executed_at')->nullable();
            $table->integer('status')->nullable()->comment('0=>pending 1->success 2=>cancel');
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
        Schema::dropIfExists('customer_orders');
    }
}
