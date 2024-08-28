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
        Schema::create('it_asset_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('form_details')->onDelete('cascade');
            $table->string('serial_number');
            $table->string('asset_tag');
            $table->text('item_description');
            $table->string('assigned_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_asset_details');
    }
};
