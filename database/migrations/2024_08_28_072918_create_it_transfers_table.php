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
        Schema::create('it_transfers', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->string('from_admin_name');
            $table->string('from_admin_mail_id');
            $table->longText('from_signature')->nullable(); // Store Base64 signature

            $table->string('from_site_in_charge_name');
            $table->longText('from_site_in_charge_signature')->nullable(); // Store Base64 signature

            $table->string('to_admin_name');
            $table->string('to_admin_mail_id');
            $table->longText('to_signature')->nullable(); // Store Base64 signature
            $table->string('to_site_in_charge_name');

            $table->string('approved_by_name');
            $table->longText('approved_by_signature')->nullable(); // Store Base64 signature

            $table->string('reviewed_by')->nullable();
            $table->dateTime('review_date')->nullable();

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
        Schema::dropIfExists('it_transfers');
    }
};
