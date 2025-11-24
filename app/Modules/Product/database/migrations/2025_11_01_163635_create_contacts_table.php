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
        if(!Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('contact_id')->unique();
                $table->enum('type', ['customer', 'supplier', 'both'])->default('customer');
                $table->string('name');
                $table->string('phone')->unique();
                $table->string('email')->nullable()->unique();
                $table->string('address')->nullable();
                $table->decimal('opening_balance', 8, 2)->default(0);
                $table->text('remarks')->nullable();
                $table->tinyInteger('status')->default(1)->comment('0=>inactive, 1=>active');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
