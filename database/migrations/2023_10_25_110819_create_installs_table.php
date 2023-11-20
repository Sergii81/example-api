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
        if (! Schema::hasTable('installs')) {
            Schema::create('installs', function (Blueprint $table) {
                $table->id();
                $table->string('owner_id')->nullable();
                $table->string('app_uuid')->nullable();
                $table->string('external_id')->nullable();
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->string('ip')->nullable();
                $table->string('country')->nullable();
                $table->text('useragent')->nullable();
                $table->integer('install')->default(0)->nullable();
                $table->integer('open')->default(0)->nullable();
                $table->integer('subscribe')->default(0)->nullable();
                $table->integer('reg')->default(0)->nullable();
                $table->integer('dep')->default(0)->nullable();
                $table->integer('template')->nullable();
                $table->string('sub1')->nullable();
                $table->string('sub2')->nullable();
                $table->string('sub3')->nullable();
                $table->string('sub4')->nullable();
                $table->string('sub5')->nullable();
                $table->string('sub6')->nullable();
                $table->string('sub7')->nullable();
                $table->string('sub8')->nullable();
                $table->string('fb_p')->nullable();
                $table->string('fb_c')->nullable();
                $table->string('link')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installs');
    }
};
