<?php

namespace App\Repository;

interface StudentRepositoryInterface
{
      // GetStudent
     public function GetStudent();

      // CreateStudent
    public function CreateStudent();

      // getClassrooms
    public function getClassrooms($id);

      // getSections
    public function getSections($id);

      // StoreStudents
    public function StoreStudents($request);

      // EditStudent
      public function EditStudent($id);

      // UpdateStudents
    public function UpdateStudents($request);

      // ShowStudent
     public function ShowStudent($id);

      // DeleteStudents
    public function DeleteStudents($request);

      // GetStudent
     public function Parents_Student($id);

      // Upload_attachment
     public function UploadAttachment($request);

      // Download_attachment
     public function DownloadAttachment($studentsname,$Filename);

        // Delete_attachment
    public function DeleteAttachment($request);
 
}

  









