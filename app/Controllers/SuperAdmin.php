<?php

namespace App\Controllers;

class SuperAdmin extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home : Admin',
    ];
    return view('superadmin/profile/home', $data);
  }
}