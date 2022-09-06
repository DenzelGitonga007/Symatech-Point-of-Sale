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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            // Additional fields

            // The relationships
            // $table->foreignId('order_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('product_id');


            // The relationship
            $table->foreignId('order_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
    
            $table->integer('quantity');
            $table->integer('unitprice');
            $table->integer('amount');
            
            



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
        Schema::dropIfExists('order_details');
    }
};
