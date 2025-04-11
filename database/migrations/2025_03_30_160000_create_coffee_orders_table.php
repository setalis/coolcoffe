<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coffee_orders', function (Blueprint $table) {
            $table->id();
            $table->string('prodname');
            $table->string('prodimage');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('sub2')->nullable();
            $table->string('reff')->nullable();
            $table->string('temp')->nullable();
            $table->string('hit')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coffee_orders');
    }
}; 