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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('from_region_id');
            $table->unsignedInteger('to_region_id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->date('delivery_date');
            $table->unsignedTinyInteger('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('user_id','fk_order_id_user')
                ->references('id')->on('users');
            $table->foreign('from_region_id','fk_order_from_region_id')
                ->references('id')->on('regions');
            $table->foreign('to_region_id','fk_order_to_region_id')
                ->references('id')->on('regions');
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
