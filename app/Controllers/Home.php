<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    return view('Home');
  }

  public function generate()
  {
    echo password_hash('123456', PASSWORD_BCRYPT);
  }
}
