<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livrables', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('type');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('consultant_id');
            $table->date('start_date');
            $table->integer('duration');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('users');
            $table->foreign('consultant_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livrables');
    }
};