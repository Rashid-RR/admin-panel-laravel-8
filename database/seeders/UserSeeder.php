<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'branch_id' => 1,
            'name' => 'Rashid',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => bcrypt('password')
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'branch_id' => 2,
            'name' => 'Abbas',
            'email' => 'abbas@abbas.com',
            'username' => 'abbas44',
            'password' => bcrypt('password')
        ]);
    }
}
