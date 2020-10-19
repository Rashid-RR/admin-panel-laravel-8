<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
            'name' => 'Morning',
            'workingHours' => '8',
            'startTime' => '10:00:00.0000000',
            'endTime' => '23:59:59.9999999',
            'monday' => '1',
            'tuesday' => '1',
            'wednesday' => '1',
            'thursday' => '1',
            'friday' => '1',
            'saturday' => '0',
            'sunday' => '0',
        ]);
    }
}
