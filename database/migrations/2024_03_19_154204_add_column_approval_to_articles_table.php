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
        Schema::table('articles', function (Blueprint $table) {
           $table->boolean('status_approve')->nullable();
           $table->foreignId('user_approve_id')->nullable()->constrained('users');
           $table->text('keterangan_approve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('status_approve');
            $table->dropColumn('keterangan_approve');
            $table->dropConstrainedForeignId('user_approve_id');
            
        });
    }
};
