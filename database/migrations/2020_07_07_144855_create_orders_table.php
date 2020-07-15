<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->contrained('users')->onDelete('cascade');
            $table->json('carts');
            $table->json('adress_maps');
            $table->json('adress_details');
            $table->text('deliverable_date');
            $table->text('deliverable_type');
            $table->integer('all_prices');
            $table->boolean('deliver');
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
        Schema::dropIfExists('orders');
    }
}
