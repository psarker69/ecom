<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoCategory = [
            'Honey', 'Natural Oil', 'Nuts', 'Coconut', 'Butter'
        ];

        foreach($demoCategory as $value) {
            Category::create([
                'title' => $value,
                'slug' => Str::slug($value),
            ]);
        }
    }
}
