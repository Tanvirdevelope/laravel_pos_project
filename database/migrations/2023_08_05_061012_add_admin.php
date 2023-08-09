<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
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
        $admin = [
            'name' => 'Tanvir Chowdhury',
            'email' => 'tanvir@gmail.com',
            'password' => Hash::make(1234),
            'phone' => 243423434,
            'email_verified_at' => now(),
        ];
        Admin::create($admin);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
