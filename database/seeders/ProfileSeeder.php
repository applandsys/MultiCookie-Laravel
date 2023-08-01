<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::insert([
            ['user_id'=>1,'name'=>'Fb 1','proxy_id'=>1,'site_id'=>1,'site_cookie'=>'0','sync_count'=>0,'status'=>'active'],
        ]);
    }
}
