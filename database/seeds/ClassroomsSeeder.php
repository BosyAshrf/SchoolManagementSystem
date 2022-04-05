<?php

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Classrooms')->delete();
        $Classrooms = [

            [
                'en'=> 'First Grade',
                'ar'=> 'الصف الاول'
            ],
            [
                'en'=> 'Second Grade',
                'ar'=> 'الصف الثانى'
            ],
            [
                'en'=> 'Third Grade',
                'ar'=> 'الصف الثالث'
            ],

        ];

        foreach ($Classrooms as $class) {
            Classroom::create([
            'Name_Class' => $class,
            'Grade_id' => Grade::all()->unique()->random()->id,
        ]);
        }
    }
}
