<?php

use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ParentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
        $my_parents = new My_Parent();
        $my_parents->Email ='BOSY7ABIB@gmail.com';
        $my_parents->Password = Hash::make('12345678899');
        $my_parents->Name_Father =['en'=>'AshrfHabib','ar'=>'اشرف حبيب'];
        $my_parents->National_ID_Father ='1234567890';
        $my_parents->Passport_ID_Father ='1234567890';
        $my_parents->Phone_Father ='12345678900';
        $my_parents->Job_Father =['en'=>'Trader','ar'=>'تاجر'];
        $my_parents->Nationality_Father_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->Blood_Type_Father_id = Type_Blood::all()->unique()->random()->id;
        $my_parents->Religion_Father_id = Religion::all()->unique()->random()->id;
        $my_parents->Address_Father ='المحلة الكبرى';

        $my_parents->Name_Mother =['en'=>'Mona','ar'=>'منى'];
        $my_parents->National_ID_Mother ='1234567890';
        $my_parents->Passport_ID_Mother ='1234567890';
        $my_parents->Phone_Mother ='12345678900';
        $my_parents->Job_Mother =['en'=>'Teacher','ar'=>'مدرسة'];
        $my_parents->Nationality_Mother_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->Blood_Type_Mother_id = Type_Blood::all()->unique()->random()->id;
        $my_parents->Religion_Mother_id = Religion::all()->unique()->random()->id;
        $my_parents->Address_Mother ='المحلة الكبرى';
        $my_parents->save();
  
}
}