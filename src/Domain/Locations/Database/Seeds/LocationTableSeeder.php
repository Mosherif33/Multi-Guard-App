<?php

namespace Src\Domain\Locations\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Locations\Entities\Location;

class LocationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Location::factory(1000)->times(50);
    }
}
