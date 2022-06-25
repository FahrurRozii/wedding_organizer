<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    // 1 data
    // $data = [
    //   'name_user' => 'Administrator',
    //   'email_user' => 'dev.admin@gmail.com',
    //   'password_user' => password_hash('123456', PASSWORD_BCRYPT),
    // ];
    // $this->db->table('users')->insert($data);

    $data = [
      [
        'name_user' => 'ucok',
        'email_user' => 'dev.ucok@gmail.com',
        'password_user' => password_hash('123456', PASSWORD_BCRYPT),
      ],
      [
        'name_user' => 'Maorid',
        'email_user' => 'dev.maorid@gmail.com',
        'password_user' => password_hash('123456', PASSWORD_BCRYPT),
      ],
      [
        'name_user' => 'udin',
        'email_user' => 'dev.udin@gmail.com',
        'password_user' => password_hash('123456', PASSWORD_BCRYPT),
      ],
      [
        'name_user' => 'gojo',
        'email_user' => 'dev.gojo@gmail.com',
        'password_user' => password_hash('123456', PASSWORD_BCRYPT),
      ],
    ];
    $this->db->table('users')->insertBatch($data);
  }
}
