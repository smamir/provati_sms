<?php
namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('states')->delete();

        $states = [
            'Dhaka', 'Chittagong', 'Barisal', 'Khulna', 'Rajshahi', 'Mymensingh', 'Rangpur', 'Sylhet',
        ];

        foreach ($states as $state) {
            State::create(['name' => $state]);
        }
    }

}
