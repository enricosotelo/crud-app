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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('type', [
                'social',
                'cultural',
                'esportivo',
                'corporativo',
                'religioso',
                'entretenimento',
                'outros'
            ]);
            $table->string('name');
            $table->text('description');
            $table->dateTime('start_at');
            $table->string('address');
            $table->string('link_address');
            $table->decimal('price', 8, 2);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
