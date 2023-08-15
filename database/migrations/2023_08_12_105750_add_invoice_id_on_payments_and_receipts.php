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
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreignId('sale_invoice_id')->nullable()->after('user_id');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('purchase_invoice_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('sale_invoice_id');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('purchase_invoice_id');
        });
    }
};
