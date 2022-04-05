<?php

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sections')->delete();
        $Sections = [

            [
                'en'=> 'A',
                'ar'=> 'ا'
            ],
            [
                'en'=> 'B',
                'ar'=> 'ب'
            ],
            [
                'en'=> 'C',
                'ar'=> 'ت'
            ],

        ];

        foreach ($Sections as $Section) {
            Section::create([
            'Section_Name' => $Section,
            'Status' => 1,
            'Grade_id' => Grade::all()->unique()->random()->id,
            'Class_id' => Classroom::all()->unique()->random()->id,
        ]);
        }
    }
}
