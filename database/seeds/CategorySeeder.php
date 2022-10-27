<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'order' => 'AA',
            'name' => 'CAJAS MEDIDAS ESPECIALES',
        ]);

        Category::create([
            'order' => 'BB',
            'name'  => 'CAJAS MEDIDAS ESTANDART',
        ]);

        Category::create([
            'order' => 'CC',
            'name'  => 'ROLLOS CORRUGADOS SIMPLE FAZ',
        ]);
    
    }
}
