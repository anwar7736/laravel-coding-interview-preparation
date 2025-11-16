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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->enum('type', ['sell', 'sell_return', 'purchase', 'purchase_return'])->default('sell');
            $table->string('invoice_no')->unique();
            $table->decimal('total', 15, 2)->default(0);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('other_cost', 15, 2)->default(0);
            $table->decimal('final_total', 15, 2)->default(0);
            $table->enum('payment_status', ['due', 'partial', 'paid'])->default('due');
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>inactive, 1=>active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
