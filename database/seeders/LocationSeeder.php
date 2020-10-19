<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'location' => 'DHA Block A',
            'country' => 'Pakistan',
            'city' => 'Lahore',
            'zipCode' => '54600',
            'address' => 'DHA Block A near doodh vala !'
        ]);
    }
}
