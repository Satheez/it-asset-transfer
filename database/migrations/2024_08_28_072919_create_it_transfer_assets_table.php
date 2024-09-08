<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('it_transfer_assets', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('it_transfer_id')->constrained('it_transfers')->onDelete('cascade');
            $table->string('serial_number');
            $table->string('asset_tag');
            $table->text('item_description');
            $table->string('assigned_to');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
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
