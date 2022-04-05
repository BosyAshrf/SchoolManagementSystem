<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\PaymentsRepositryInterface;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    protected $Payments;

    public function __construct(PaymentsRepositryInterface $Payments)
    {
        $this->Payments = $Payments;
    }

    public function index()
    {
       return $this->Payments->index();
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        return $this->Payments->store($request);
    }

   
    public function show($id)
    {
        return $this->Payments->show($id);
    }

   
    public function edit($id)
    {
       return $this->Payments->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Payments->update($request);
    }

   
    public function destroy(Request $request)
    {
        return $this->Payments->destroy($request);
    }
}
