<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livrable_files', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('livrable_id');
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('livrable_id')->references('id')->on('livrables')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livrable_files');
    }
};