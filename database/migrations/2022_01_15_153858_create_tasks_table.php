<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigInteger('id', true, true);
            $table->unsignedBigInteger('cart_id');
            $table->string('name');
            $table->longText('description');
            $table->date('due_date');
            $table->integer('is_important');
            $table->string('status')->default('Active');
            $table->foreign('cart_id')->references('id')->on('tasks_cart')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
