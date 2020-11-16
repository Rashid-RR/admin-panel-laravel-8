<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'type' => 'Resume'
        ]);
        DB::table('document_types')->insert([
            'type' => 'Certificate'
        ]);
        DB::table('document_types')->insert([
            'type' => 'CV'
        ]);
        DB::table('document_types')->insert([
            'type' => 'Other'
        ]);
    }
}
