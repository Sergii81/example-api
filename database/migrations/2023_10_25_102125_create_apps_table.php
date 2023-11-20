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
        if (! Schema::hasTable('apps')) {
            Schema::create('apps', function (Blueprint $table) {
                $table->id();
                $table->string('app_uuid')->nullable();
                $table->string('sub')->nullable();
                $table->string('domain')->nullable();
                $table->string('template')->nullable();
                $table->string('app_lang')->nullable();
                $table->string('owner_id')->nullable();
                $table->string('geo')->nullable();
                $table->string('pixel_id')->nullable();
                $table->text('pixel_key')->nullable();
                $table->string('link')->nullable();
                $table->string('onesignal')->nullable();
                $table->string('whitepage')->nullable();
                $table->tinyInteger('status')->nullable();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps');
    }
};
