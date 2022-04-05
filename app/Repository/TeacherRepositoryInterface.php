<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function AllTeachers();

 // get all Specializations
    public function AllSpecializations();

     // get all Genders
    public function AllGenders();

     // StoreTeachers
    public function StoreTeachers($request);

     // StoreTeachers
    public function EditTeachers($id);

        // UpdateTeachers
    public function UpdateTeachers($request);

        // DeleteTeachers
    public function DeleteTeachers($request);
    



}

  









