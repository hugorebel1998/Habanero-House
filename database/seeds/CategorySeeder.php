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
            'nombre' => 'Del dia de la casa',
            'slug' => 'del dia de la casa',
            'descripcion' => 'Categoria de productos'
        ]);

        Category::create([
            'nombre' => 'Degustación',
            'slug' => 'degustación',
            'descripcion' => 'Categoria de productos'
        ]);

        Category::create([
            'nombre' => 'Fijo',
            'slug' => 'fijo',
            'descripcion' => 'Categoria de productos'
        ]);        
    }
}
