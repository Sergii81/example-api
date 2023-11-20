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
        if (! Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('app_uuid')->nullable();
                $table->string('app_name')->nullable();
                $table->string('app_author')->nullable();
                $table->string('app_icon')->default('')->nullable();
                $table->text('image_set')->nullable();
                $table->float('app_rating')->nullable();
                $table->string('fb_continue')->nullable();
                $table->text('about')->nullable();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
