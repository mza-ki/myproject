<?php

namespace App\Controllers;

class Kasir extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home : Kasir',
    ];
    return view('kasir/profile/home', $data);
  }
}