<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tasks', function (Blueprint $table) {

        $table->foreignId('consultant_id')
              ->constrained('users')
              ->cascadeOnDelete();

    });
}

public function down()
{
    Schema::table('tasks', function (Blueprint $table) {

        $table->dropColumn('consultant_id');

    });
}
};
