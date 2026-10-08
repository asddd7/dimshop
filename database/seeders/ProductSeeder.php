<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $products = [
            [
                'name' => 'Kaos Polos Premium',
                'slug' => 'kaos-polos-premium',
                'description' => 'Kaos katun nyaman untuk penggunaan sehari-hari.',
                'price' => 85000,
                'stock' => 25,
                'image' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Tas Selempang Kanvas',
                'slug' => 'tas-selempang-kanvas',
                'description' => 'Tas kanvas praktis dengan kompartemen utama yang luas.',
                'price' => 125000,
                'stock' => 12,
                'image' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Botol Minum Stainless',
                'slug' => 'botol-minum-stainless',
                'description' => 'Botol minum stainless steel kapasitas 500 ml.',
                'price' => 99000,
                'stock' => 18,
                'image' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Topi Kasual',
                'slug' => 'topi-kasual',
                'description' => 'Topi kasual dengan ukuran yang dapat disesuaikan.',
                'price' => 65000,
                'stock' => 0,
                'image' => null,
                'is_active' => false,
            ],
            [
                'name' => 'Dompet Kulit Sintetis',
                'slug' => 'dompet-kulit-sintetis',
                'description' => 'Dompet ringkas dengan banyak slot kartu.',
                'price' => 110000,
                'stock' => 9,
                'image' => null,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['slug' => $product['slug']],
                [...$product, 'created_at' => $now, 'updated_at' => $now],
            );
        }
    }
}
