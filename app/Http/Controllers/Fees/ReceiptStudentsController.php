<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{
    protected $ReceiptStudents;

    public function __construct(ReceiptStudentsRepositoryInterface $ReceiptStudents)
    {
        $this->ReceiptStudents = $ReceiptStudents;
    }

    public function index()
    {
        return $this->ReceiptStudents->index();
    }

    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
       return $this->ReceiptStudents->store($request);

    }

    
    public function show($id)
    {
        return $this->ReceiptStudents->show($id);
    }

   
    public function edit($id)
    {
        return $this->ReceiptStudents->edit($id);
    }

    

    public function update(Request $request)
    {
        return $this->ReceiptStudents->update($request);
    }

    

    public function destroy(Request $request)
    {
        return $this->ReceiptStudents->destroy($request);
    }
}
