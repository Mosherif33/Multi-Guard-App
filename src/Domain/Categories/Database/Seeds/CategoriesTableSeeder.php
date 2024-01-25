<?php

namespace Src\Domain\Categories\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Categories\Entities\Categories;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Categories::factory(1000)->times(50);
    }
}
