<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add a UUID column, unique, and nullable (for existing users without UUID)
            $table->uuid()->nullable()->unique()->after('id');
        });

        // Optionally: If you want to backfill the UUID for existing users
        // You can add the code here to ensure all users have a UUID
        DB::table('users')->whereNull('uuid')->update([
            'uuid' => DB::raw('(UUID())'),
        ]);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
