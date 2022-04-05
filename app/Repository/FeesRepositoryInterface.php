<?php

namespace App\Repository;

interface FeesRepositoryInterface
{
  public function index();
  
  public function Create();

  public function Edit($id);

  public function Store($request);

  public function Update($request);

  public function Destory($request);
  
}

  









