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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->restrictOnDelete();
            $table->decimal('amount_paid', 10, 2);
            $table->string('payment_method_used');
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'refunded', 'cancelled'])->default('pending');
            $table->string('gateway_transaction_id')->nullable();
            $table->string('paymongo_payment_intent_id')->nullable();
            $table->string('paymongo_payment_method_id')->nullable();
            $table->json('payment_gateway_response')->nullable();
            $table->decimal('gateway_fee_amount', 10, 2)->nullable();
            $table->timestamp('payment_processed_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->json('refund_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
