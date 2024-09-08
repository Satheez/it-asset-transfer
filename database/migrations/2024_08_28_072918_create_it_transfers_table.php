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
            $table->string('from_admin_name');
            $table->string('from_admin_mail_id');
            $table->text('from_signature')->nullable(); // Store Base64 signature

            $table->string('from_site_in_charge_name');
            $table->text('from_site_in_charge_signature')->nullable(); // Store Base64 signature

            $table->string('to_admin_name');
            $table->string('to_admin_mail_id');
            $table->text('to_signature')->nullable(); // Store Base64 signature
            $table->string('to_site_in_charge_name');

            $table->string('approved_by_name');
            $table->text('approved_by_signature')->nullable(); // Store Base64 signature

            $table->string('reviewed_by')->nullable();
            $table->timestamp('review_date')->nullable();

            $table->softDeletes();
            $table->timestamps();
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
