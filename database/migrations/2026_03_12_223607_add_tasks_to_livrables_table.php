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
    Schema::table('livrables', function (Blueprint $table) {
        $table->json('tasks')->nullable();
    });
}

public function down(): void
{
    Schema::table('livrables', function (Blueprint $table) {
        $table->dropColumn('tasks');
    });
}
};
