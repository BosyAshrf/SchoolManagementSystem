<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest; 

class StudentController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }
   

    public function index()
    {
       return $this->Student->GetStudent();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return $this->Student->CreateStudent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {
        return $this->Student->StoreStudents($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $this->Student->ShowStudent($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return $this->Student->EditStudent($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentsRequest $request)
    {
        return $this->Student->UpdateStudents($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Student->DeleteStudents($request);
    }

    public function getClassrooms($id)
    {
        return $this->Student->getClassrooms($id);
    }

    public function getSections($id)
    {
        return $this->Student->getSections($id);
    }

    public function Parents_Student($id)
    {
       return $this->Student->Parents_Student($id);

    }

    public function Upload_attachment(Request $request)
    {
        return $this->Student->UploadAttachment($request);
    }

    public function Download_attachment($studentname,$filename)
    {
        return $this->Student->DownloadAttachment($studentname,$filename);
    }

    public function Delete_attachment(Request $request)
    {
       return $this->Student->DeleteAttachment($request);
    }

}
