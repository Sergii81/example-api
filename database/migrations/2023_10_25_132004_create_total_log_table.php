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
        if (! Schema::hasTable('total_log')) {
            Schema::create('total_log', function (Blueprint $table) {
                $table->id();
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->text('body')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_log');
    }
};
