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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('consumption_fuel');
            $table->string('service_schedule');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('ownership_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('vehicle_types')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ownership_id')->references('id')->on('vehicle_ownerships')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
