<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Playgroup', 'class_type_id' => $ct[0]],
            ['name' => 'Nursery', 'class_type_id' => $ct[1]],
            ['name' => 'Class 1', 'class_type_id' => $ct[2]],
            ['name' => 'Class 2', 'class_type_id' => $ct[2]],
            ['name' => 'Class 6', 'class_type_id' => $ct[3]],
            ['name' => 'Class 7', 'class_type_id' => $ct[3]],

            ];

        DB::table('my_classes')->insert($data);

    }
}
