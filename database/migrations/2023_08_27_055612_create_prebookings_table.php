<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prebookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
             $table->text('customer_name')->nullable();
             $table->text('customer_email')->nullable();
             $table->text('customer_mobile')->nullable();
             $table->text('item_name')->nullable();
             $table->text('description')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('prebookings');
    }
};
