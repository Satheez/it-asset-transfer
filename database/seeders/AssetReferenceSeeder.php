<?php

namespace Database\Seeders;

use App\Models\AssetReference;
use Illuminate\Database\Seeder;

class AssetReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Force delete all existing data before seeding
        AssetReference::truncate();

        // Seed new sample data for serial numbers
        AssetReference::factory()->count(100)->serialNumber()->create();

        // Seed new sample data for asset tags
        AssetReference::factory()->count(100)->assetTag()->create();
    }
}
