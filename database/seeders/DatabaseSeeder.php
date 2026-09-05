<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | AKUN ADMIN
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(
            [
                'email' => 'adminosonitensif@gmail.com',
            ],
            [
                'name' => 'Oson Intensif',
                'password' => Hash::make('AdminOson123!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | DATA KATEGORI & PRODUK
        |--------------------------------------------------------------------------
        | updateOrCreate dipakai agar seeder aman dijalankan berulang kali.
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name' => 'Makanan',
                'slug' => 'makanan',
                'description' => 'Berbagai macam makanan.',
                'is_active' => true,
            ],
            [
                'name' => 'Minuman',
                'slug' => 'minuman',
                'description' => 'Berbagai macam minuman.',
                'is_active' => true,
            ],
            [
                'name' => 'Snack',
                'slug' => 'snack',
                'description' => 'Berbagai macam snack.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {

            $category = Category::updateOrCreate(
                [
                    'slug' => $categoryData['slug'],
                ],
                [
                    'name' => $categoryData['name'],
                    'description' => $categoryData['description'],
                    'is_active' => $categoryData['is_active'],
                ]
            );

            $products = [
                [
                    'name' => $categoryData['name'] . ' Produk 1',
                    'price' => 10000,
                    'stock' => 20,
                ],
                [
                    'name' => $categoryData['name'] . ' Produk 2',
                    'price' => 15000,
                    'stock' => 15,
                ],
            ];

            foreach ($products as $productData) {

                $productName = $productData['name'];

                Product::updateOrCreate(
                    [
                        'slug' => Str::slug($productName),
                    ],
                    [
                        'category_id' => $category->id,
                        'name' => $productName,
                        'description' => 'Contoh produk ' . strtolower($categoryData['name']),
                        'price' => $productData['price'],
                        'stock' => $productData['stock'],
                        'image' => null,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}