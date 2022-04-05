<?php

namespace App\Repository;

interface StudentGratuatedRepositoryInterface
{
   
    public function index();

    public function Create();

    public function StoreStudent($request);

    public function ReturnStudent($request);

    public function Destroy($request);

}

  









