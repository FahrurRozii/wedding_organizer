<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Contact extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    for ($i = 1; $i <= 12; $i++) {
      $data = [
        'name_contact' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->freeEmail,
        'address' => $faker->address,
        'id_group' => 11,
        'created_at' => Time::now(),
      ];
      $this->db->table('contacts')->insert($data);
    }
  }
}
