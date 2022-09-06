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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('company_name')->default('Symatech');
            $table->string('company_address')->default('Symatech address');
            $table->string('company_phone')->default('+254714082283');
            $table->string('company_email')->default('gitongadenzel@gmail.com');
            $table->string('company_fax')->default('+254714082283');


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
        Schema::dropIfExists('companies');
    }
};
