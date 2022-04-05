<?php

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Grades')->delete();
        $grades = [

            [
                'en'=> 'primary grade',
                'ar'=> 'المرحلة الابتدائية'
            ],
            [
                'en'=> 'Middle grade',
                'ar'=> 'المرحلة الاعدادية'
            ],
            [
                'en'=> 'secondary grade',
                'ar'=> 'المرحلة الثانوية'
            ],

        ];

        foreach ($grades as $grade) {
            Grade::create(['Name' => $grade]);
        }
    }
}
