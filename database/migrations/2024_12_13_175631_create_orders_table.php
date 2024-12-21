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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming the user is logged in
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('phone');
            $table->decimal('total', 8, 2); // Order total
            $table->enum('status', ['pending', 'done','inprocess'])->default('pending'); // To mark if order is done
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
};
