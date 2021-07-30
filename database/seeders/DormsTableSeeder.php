<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dorms')->delete();
        $data = [
            ['name' => 'Nur Mohammad'],
            ['name' => 'Mohiuddin Jahangir'],
            ['name' => 'Shahid Salam'],
        ];
        DB::table('dorms')->insert($data);
    }
}
