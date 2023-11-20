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
        if (! Schema::hasTable('event_logs')) {
            Schema::create('event_logs', function (Blueprint $table) {
                $table->id();
                $table->string('owner_id')->nullable();
                $table->string('app_uuid')->nullable();
                $table->string('external_id')->nullable();
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->string('action')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_logs');
    }
};
