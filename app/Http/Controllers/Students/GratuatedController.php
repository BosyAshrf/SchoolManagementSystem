<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\StudentGratuatedRepositoryInterface;

class GratuatedController extends Controller
{
    protected $Gratuated;

    public function __construct(StudentGratuatedRepositoryInterface $Gratuated)
    {
        $this->Gratuated = $Gratuated;
    }


    public function index()
    {
        return $this->Gratuated->index();
    }

   
    public function create()
    {
       return $this->Gratuated->Create();
    }

   
    public function store(Request $request)
    {
      return $this->Gratuated->StoreStudent($request);
    }

   
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        return $this->Gratuated->ReturnStudent($request);
    }


    public function destroy(Request $request)
    {
       return $this->Gratuated->Destroy($request);
    }
}
