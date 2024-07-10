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
        Schema::table('followings', function (Blueprint $table) {
            $table->string('show_image', 200)->after('show_id');
            $table->string('show_name', 200)->after('show_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('followings', function (Blueprint $table) {
            $table->dropColumn('show_image');
            $table->dropColumn('show_name');
        });
    }
};
