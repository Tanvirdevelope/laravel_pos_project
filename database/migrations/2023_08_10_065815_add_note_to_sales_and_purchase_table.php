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
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });

        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });

        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
};
