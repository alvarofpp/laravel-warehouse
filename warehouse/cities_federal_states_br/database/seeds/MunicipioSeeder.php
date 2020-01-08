<?php

use App\Models\Municipio;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [];
        $file = fopen(storage_path('app/seed/municipios.csv'), 'r');

        while (($seed = fgetcsv($file, 1000, ',')) !== false) {
            array_push($seeders, [
                'id' => $seed[0],
                'unidade_federal_id' => $seed[1],
                'nome' => $seed[2],
            ]);
        }

        fclose($file);
        Municipio::insert($seeders);
    }
}
