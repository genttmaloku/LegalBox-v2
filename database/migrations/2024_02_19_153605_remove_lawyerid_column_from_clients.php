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
        Schema::table('clients', function (Blueprint $table) {
            if (Schema::hasColumn('clients', 'lawyer_id')) {
                // Drop foreign key
                $table->dropForeign(['lawyer_id']);
            }

            // Check if the column exists before attempting to drop it
            if (Schema::hasColumn('clients', 'lawyer_id')) {
                // Drop the column
                $table->dropColumn('lawyer_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
};
