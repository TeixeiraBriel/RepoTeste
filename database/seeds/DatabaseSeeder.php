<?php

use App\Candidato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        $candidates = [
            0 => [
                "id" => 1,
                "name" => "José Augusto",
                "date_of_birth" => "2002-10-05",
                "zip_code" => "30350120",
                "city" => "Belo Horizonte",
                "uf" => "MG"
            ],
            1 => [
                "id" => 2,
                "name" => "Maria das Graças",
                "date_of_birth" => "2003-07-15",
                "zip_code" => "30122120",
                "city" => "Campinas",
                "uf" => "SP"
            ]
        ];
        DB::table('candidatos')->insert( $candidates);
    }
}
