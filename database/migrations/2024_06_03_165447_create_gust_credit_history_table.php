<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gust_credit_history', function (Blueprint $table) {
            $table->id();
            $table->integer('tool_id');
            $table->string('ip_address')->nullable();
            $table->integer('credit_consumed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gust_credit_history');
    }
};
