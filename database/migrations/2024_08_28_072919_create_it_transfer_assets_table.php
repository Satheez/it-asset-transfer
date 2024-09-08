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
        Schema::create('it_transfer_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('it_transfer_id')->constrained('it_transfers')->onDelete('cascade');
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
        Schema::dropIfExists('it_transfer_assets');
    }
};
