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
        Schema::create('rider_payouts', function (Blueprint $table) {
           $table->id();
            $table->foreignId('rider_user_id')->constrained('users')->cascadeOnDelete();
            $table->date('payout_period_start_date');
            $table->date('payout_period_end_date');
            $table->decimal('total_delivery_fees_earned', 10, 2);
            $table->decimal('total_incentives_earned', 10, 2)->nullable();
            $table->decimal('adjustments_amount', 10, 2)->nullable();
            $table->text('adjustments_notes')->nullable();
            $table->decimal('total_payout_amount', 10, 2);
            $table->enum('status', ['pending_calculation', 'ready_for_payout', 'paid'])
             ->default('pending_calculation');           
            $table->timestamp('paid_at')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rider_payouts');
    }
};
