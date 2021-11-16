<?php

use Illuminate\Database\Seeder;
use App\Category;


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
            'nombre' => 'Entradas',
            'slug' => 'fusión-europea-y-peninsula',
            'descripcion' => 'Categoria fusión europea y peninsula'
        ]);
        Category::create([
            'nombre' => 'Sopas',
            'slug' => 'sopas',
            'descripcion' => 'Categoria sopas'
        ]);

        Category::create([
            'nombre' => 'Ensaladas',
            'slug' => 'ensaladas',
            'descripcion' => 'Categoria ensaladas'
        ]);

        Category::create([
            'nombre' => 'Antojitos regionales',
            'slug' => 'antojitos-regionales',
            'descripcion' => 'Categoria antogitos regionales'
        ]);

        Category::create([
            'nombre' => 'Fusión Europea y Peninsula',
            'slug' => 'fusión-europea-y-peninsula',
            'descripcion' => 'Categoria fusión europea y peninsula'
        ]);

        



        

        
    }
}

