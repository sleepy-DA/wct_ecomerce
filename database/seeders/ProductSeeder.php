<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    // database/seeders/ProductSeeder.php
public function run(): void
{
    $products = [
        [
            'name' => 'Hydrating Rose Toner',
            'description' => 'A gentle toner infused with rose water to soothe and hydrate skin.',
            'price' => 14.99,
            'image' => 'products/hydrating_rose_toner.jpg',
            'category' => 'toner',
        ],
        [
            'name' => 'Vitamin C Serum',
            'description' => 'Brightening serum with 15% vitamin C for radiant, glowing skin.',
            'price' => 22.50,
            'image' => 'products/vitamin_c_cream.jpg',
            'category' => 'serum',
        ],
        [
            'name' => 'Aloe Vera Gel',
            'description' => 'Soothing and moisturizing aloe vera gel for irritated skin.',
            'price' => 9.99,
            'image' => 'products/aloe_vera_gel.jpg',
            'category' => 'gel',
        ],
        [
            'name' => 'Niacinamide Serum',
            'description' => 'Improves skin texture and reduces appearance of pores.',
            'price' => 17.25,
            'image' => 'products/niacinamide_serum.jpeg',
            'category' => 'serum',
        ],
        [
            'name' => 'Green Tea Cleanser',
            'description' => 'Foaming face wash with green tea extract for oily skin.',
            'price' => 11.50,
            'image' => 'products/green_tea_cleanser.jpg',
            'category' => 'cleanser',
        ],
        [
            'name' => 'Hyaluronic Acid Moisturizer',
            'description' => 'Deep hydration for dry and sensitive skin types.',
            'price' => 18.00,
            'image' => 'products/hydra_moist.jpg',
            'category' => 'moisturizer',
        ],
        [
            'name' => 'SPF 50 Sunscreen',
            'description' => 'Lightweight, non-greasy sunscreen for daily protection.',
            'price' => 15.75,
            'image' => 'products/spf_50_sunscreen.jpg',
            'category' => 'sunscreen',
        ],
        [
            'name' => 'Charcoal Clay Mask',
            'description' => 'Detoxifying mask that removes impurities and blackheads.',
            'price' => 13.40,
            'image' => 'products/charcoal_mask.jpg',
            'category' => 'mask',
        ],
        [
            'name' => 'Cica Repair Cream',
            'description' => 'Calms redness and helps repair the skin barrier.',
            'price' => 19.90,
            'image' => 'products/cica_repair_cream.jpg',
            'category' => 'cream',
        ],
        [
            'name' => 'Gentle Exfoliating Scrub',
            'description' => 'Natural exfoliator with jojoba beads to smooth skin.',
            'price' => 12.20,
            'image' => 'products/exfoliating_scrub.jpg',
            'category' => 'scrub',
        ],
    ];

    foreach ($products as $product) {
        Product::create($product);
    }
}
}

