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
        Schema::create('it_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('from_admin_name');
            $table->string('from_admin_mail_id');
            $table->binary('from_signature')->nullable();
            $table->string('from_site_in_charge_name');
            $table->binary('from_site_in_charge_signature')->nullable();

            $table->string('to_admin_name');
            $table->string('to_admin_mail_id');
            $table->binary('to_signature')->nullable();
            $table->string('to_site_in_charge_name');
            $table->binary('to_site_in_charge_signature')->nullable();
            
            $table->string('approved_by_name');
            $table->binary('approved_by_signature')->nullable();
            
            $table->string('reviewed_by')->nullable();
            $table->date('review_date')->nullable();
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
