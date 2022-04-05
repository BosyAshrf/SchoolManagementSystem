<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [

            [
                'en'=> 'Arabic',
                'ar'=> 'عربي'
            ],
            [
                'en'=> 'Math',
                'ar'=> 'رياضيات'
            ],
            [
                'en'=> 'English',
                'ar'=> 'انجليزى'
            ],
            [
                'en'=> 'Science',
                'ar'=> 'علوم'
            ],
            [
                'en'=> 'Computer',
                'ar'=> 'حاسب الي'
            ],

        ];

        foreach ($specializations as $s) {
            Specialization::create(['Name' => $s]);
        }

    }
}
