<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     */
    public function up(): void
    {
        Schema::create('shows', function (Blueprint $table) {
            
            $table->id()->autoIncrement();
            $table->string('name',200);
            $table->string('image',200);
            $table->text('description');
            $table->string('type',200);
            $table->string('studios',200);
            $table->string('date_aired',200);
            $table->string('status',200);
            $table->string('genere',200);
            $table->string('duration',200);
            $table->string('quality',200);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
