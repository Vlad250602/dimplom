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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['new','processed','completed','canceled'])->default('new');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->default('');
            $table->string('surname')->default('');
            $table->string('phone')->default('');
            $table->string('country')->default('');
            $table->string('town')->default('');
            $table->string('address')->default('');
            $table->string('pay_type')->default('');
            $table->text('description');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
