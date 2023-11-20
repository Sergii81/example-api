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
        if (! Schema::hasTable('languages')) {
            Schema::create('languages', function (Blueprint $table) {
                $table->id();
                $table->integer('template_id')->nullable();
                $table->string('lang')->nullable();
                $table->string('name')->nullable();
            });

            DB::table('languages')->insert([
                [
                    'template_id' => 1,
                    'lang' => 'EN',
                    'name' => 'English'
                ],
                [
                    'template_id' => 1,
                    'lang' => 'TR',
                    'name' => 'Turkey'
                ],
                [
                    'template_id' => 2,
                    'lang' => 'EN',
                    'name' => 'English'
                ],
                [
                    'template_id' => 2,
                    'lang' => 'TR',
                    'name' => 'Turkey'
                ],
                [
                    'template_id' => 1,
                    'lang' => 'IT',
                    'name' => 'Italy'
                ],

                [
                    'template_id' => 2,
                    'lang' => 'IT',
                    'name' => 'Italy'
                ],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
