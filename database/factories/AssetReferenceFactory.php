<?php

namespace Database\Factories;

use App\Models\AssetReference;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetReferenceFactory extends Factory
{
    protected $model = AssetReference::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['serial_number', 'asset_tag']),
            'value' => $this->faker->unique()->bothify('??###'),  // Example: "SN123" or "AT987"
        ];
    }

    /**
     * State for serial number.
     */
    public function serialNumber(): AssetReferenceFactory
    {
        return $this->state(fn() => [
            'type' => 'serial_number',
        ]);
    }

    /**
     * State for asset tag.
     */
    public function assetTag(): AssetReferenceFactory
    {
        return $this->state(fn() => [
            'type' => 'asset_tag',
        ]);
    }
}
