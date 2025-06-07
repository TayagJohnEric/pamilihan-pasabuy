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
        Schema::create('delivery_zones', function (Blueprint $table) {
             $table->id();
            $table->string('zone_name')->unique();
            $table->text('description')->nullable();
            $table->decimal('base_delivery_fee', 10, 2);
            $table->decimal('fee_per_km', 10, 2)->nullable();
            $table->decimal('min_order_for_free_delivery', 10, 2)->nullable();
            $table->decimal('max_delivery_radius_km', 10, 2)->nullable();
            $table->json('polygon_coordinates')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_zones');
    }
};
