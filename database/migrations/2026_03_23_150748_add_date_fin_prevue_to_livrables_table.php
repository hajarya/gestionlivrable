<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('livrables', function (Blueprint $table) {
            $table->date('date_fin_prevue')->nullable()->after('duration');
        });
    }

    public function down(): void
    {
        Schema::table('livrables', function (Blueprint $table) {
            $table->dropColumn('date_fin_prevue');
        });
    }
};