<?php

namespace Tests\Feature;

use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_seeder_creates_products_and_can_be_run_more_than_once(): void
    {
        $this->seed(ProductSeeder::class);
        $this->seed(ProductSeeder::class);

        $this->assertSame(5, DB::table('products')->count());
        $this->assertDatabaseHas('products', [
            'slug' => 'kaos-polos-premium',
            'price' => 85000,
            'stock' => 25,
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('products', [
            'slug' => 'topi-kasual',
            'stock' => 0,
            'is_active' => false,
        ]);
    }
}
