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
        Schema::create('user_investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investment_id');
            $table->foreignId('user_id');
            $table->float('amount');
            $table->date('last_payout')->nullable();
            $table->date('next_payout')->nullable();
            $table->integer('payout_times')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('user_investments');
    }
};
