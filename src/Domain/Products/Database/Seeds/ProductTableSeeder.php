<?php

namespace Src\Domain\Products\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Products\Entities\Product;

class ProductTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Product::factory(1000)->times(50);
    }
}
