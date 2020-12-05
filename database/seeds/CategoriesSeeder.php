<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
			['name' => 'Esporte', 'description' => 'Fórum de esportes', 'active' => 1],
			['name' => 'Notícia', 'description' => 'Fórum de notícias', 'active' => 1],
			['name' => 'Moda', 'description' => 'Fórum de moda', 'active' => 1],
			['name' => 'Futebol', 'description' => 'Fórum de futebol', 'active' => 1]
		]);
    }
}
