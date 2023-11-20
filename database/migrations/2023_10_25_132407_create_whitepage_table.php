<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('whitepage')) {
            Schema::create('whitepage', function (Blueprint $table) {
                $table->id();
                $table->string('filename')->nullable();
                $table->string('geo')->nullable();
                $table->integer('status')->nullable();
            });

            DB::table('whitepage')->insert([
                [
                    'filename' => 'default.html',
                    'geo' => 'EN',
                    'status' => 1
                ],
                [
                    'filename' => 'turkey.html',
                    'geo' => 'TR',
                    'status' => 1
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whitepage');
    }
};
