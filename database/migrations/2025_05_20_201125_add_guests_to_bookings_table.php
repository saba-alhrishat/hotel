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
             if (!Schema::hasColumn('bookings', 'guests')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->integer('guests')->nullable();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn('guests');
    });
    }
};
