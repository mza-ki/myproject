<?php

namespace App\Controllers;

class Profile extends BaseController
{
	public function index(){
		$data = [
      'title' => 'Home'
    ];
    echo view('profile/home', $data);
	}
}