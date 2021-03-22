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
            $table->timestamps();

            $table->string('order_id')->comment('系統訂單號');
            $table->unsignedBigInteger('user_id');
            $table->json('cart_info')->comment('購買詳情')->nullable();
            $table->Integer('status')->comment('狀態')->default(1);
            $table->string('callback_id')->comment('金流訂單號')->default('');
            $table->json('detail')->comment('金流細節')->nullable();
            $table->json('receipt')->comment('收據詳情')->nullable();
            $table->softDeletes();
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
