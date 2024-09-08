<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asset_references', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['serial_number', 'asset_tag']); // Flexible type field
            $table->string('value'); // Store the actual serial number, asset tag, etc.
            $table->timestamps();
            $table->unique(['type', 'value']); // Ensure that the same value can't be duplicated for the same type
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_references');
    }
};
