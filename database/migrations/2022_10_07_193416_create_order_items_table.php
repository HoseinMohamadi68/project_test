<?php

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OrderItem::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(OrderItem::ORDER_ID)->constrained(Order::TABLE);
            $table->foreignId(OrderItem::COURSE_ID)->constrained(Course::TABLE);
            $table->integer(OrderItem::AMOUNT);
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
        Schema::dropIfExists(OrderItem::TABLE);
    }
}
