<?php

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        $teachers = new Teacher();
        $teachers -> Name = ['en'=>'Adam','ar'=>'ادم'];
        $teachers->Email ='Adam@gmail.com';
        $teachers->Password = Hash::make('12345678899');
        $teachers->Joining_Data = date('1997-2-15');
        $teachers->Gender_id = 1;
        $teachers->Specialization_id = Specialization::all()->unique()->random()->id;
        $teachers->Address ='المحلة الكبرى';
        $teachers->save();
    }
}
