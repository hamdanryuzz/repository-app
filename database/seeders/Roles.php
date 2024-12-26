<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'Administrator with full access', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user', 'description' => 'Standard user with limited access', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
