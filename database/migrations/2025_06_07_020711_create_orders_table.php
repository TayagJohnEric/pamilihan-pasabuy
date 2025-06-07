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
        Schema::create('orders', function (Blueprint $table) {
           $table->id();
            $table->foreignId('customer_user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('rider_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('delivery_address_id')->constrained('saved_addresses')->cascadeOnDelete();
            $table->timestamp('order_date');
            $table->enum('status', ['pending', 'preparing', 'in_transit', 'delivered', 'cancelled'])->default('pending');
            $table->decimal('estimated_total_amount', 10, 2);
            $table->decimal('delivery_fee', 10, 2)->nullable();
            $table->decimal('final_total_amount', 10, 2)->nullable();
            $table->enum('payment_method', ['cod', 'card'])->default('cod');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->string('payment_intent_id')->nullable();
            $table->text('special_instructions')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
