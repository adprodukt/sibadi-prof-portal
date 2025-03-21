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
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->text('address');
            $table->string('title')->nullable()->default(null);
            $table->foreignId('direction_id')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('days');
    }
};
