<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monthly_data', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->foreignId('company_id')->constrained();
            $table->integer('revenue');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('monthly_data');
    }
};