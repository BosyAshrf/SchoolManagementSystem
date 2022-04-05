<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type_Blood;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //اما تيجى تنفذ السيدر امسح الاول واعمل واحد جديد متعملش تكرار 
        DB::table('type__bloods')->delete();
        $bloods =['O-','O+','A-','A+','B-','B+','AB-','AB+'];

        foreach($bloods as  $blood){
            Type_Blood::create(['Name' => $blood]);
        }

        }
        
       
        
    }

