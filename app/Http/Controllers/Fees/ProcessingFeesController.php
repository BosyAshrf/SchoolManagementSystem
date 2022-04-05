<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\ProcessingFeesRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeesController extends Controller
{
    protected $ProcessingFees;

    public function __construct(ProcessingFeesRepositoryInterface $ProcessingFees)
    {
        $this->ProcessingFees = $ProcessingFees;
    }

    public function index()
    {
        return $this->ProcessingFees->index();
    }

    
    public function store(Request $request)
    {
        return $this->ProcessingFees->store($request);
    }

   
    public function show($id)
    {
        return $this->ProcessingFees->show($id);
    }

    
    public function edit($id)
    {
        return $this->ProcessingFees->edit($id);
    }

    
    public function update(Request $request)
    {
        return $this->ProcessingFees->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->ProcessingFees->destroy($request);
    }
}
