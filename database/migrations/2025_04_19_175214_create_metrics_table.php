<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_revenue');
            $table->float('revenue_growth');
            $table->integer('average_transaction');
            $table->float('transaction_growth');
            $table->integer('total_customers');
            $table->float('customer_growth');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metrics');
    }
};