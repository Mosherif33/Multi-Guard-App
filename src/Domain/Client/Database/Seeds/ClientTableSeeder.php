<?php

namespace Src\Domain\Client\Database\Seeds;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Src\Domain\Client\Entities\Client;
use Illuminate\Support\Str;

class ClientTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Client::create([
            'name' => $faker->name,
            'email' => 'Client@MohamedReda.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        Client::factory(10)->create();
    }
}
