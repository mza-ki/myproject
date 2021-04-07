<?php

namespace App\Controllers;

class Owner extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home : Owner',
    ];
    return view('owner/profile/home', $data);
  }
}