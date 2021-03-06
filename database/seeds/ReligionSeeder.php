<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Religion;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             //اما تيجى تنفذ السيدر امسح الاول واعمل واحد جديد متعملش تكرار 
             DB::table('religions')->delete();
             
             $religions = [

                [
                    'en'=> 'Muslim',
                    'ar'=> 'مسلم'
                ],
                [
                    'en'=> 'Christian',
                    'ar'=> 'مسيحي'
                ],
                [
                    'en'=> 'Other',
                    'ar'=> 'غيرذلك'
                ],
    
            ];
    
            foreach ($religions as $R) {
                Religion::create(['Name' => $R]);
            }





    }
}
