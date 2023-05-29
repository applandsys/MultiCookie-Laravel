<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::insert([
                ['name'=>'Facebook','url'=>'https://facebook.com'],
                ['name'=>'Linked IN','url'=>'https://linkedin.com'],
        ]);
    }
}
