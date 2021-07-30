<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Playgroup', 'code' => 'PG'],
            ['name' => 'Nursery', 'code' => 'N'],
            ['name' => 'Primary', 'code' => 'P'],
            ['name' => 'Secondary', 'code' => 'S'],
        ];

        DB::table('class_types')->insert($data);

    }
}
