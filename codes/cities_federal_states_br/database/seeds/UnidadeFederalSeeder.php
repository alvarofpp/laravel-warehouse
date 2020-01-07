<?php

use App\Models\UnidadeFederal;
use Illuminate\Database\Seeder;

class UnidadeFederalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder = fopen(storage_path('app/seed/estados.csv'), 'r');

        while (($seed = fgetcsv($seeder, 1000, ',')) !== false) {
            UnidadeFederal::create([
                'id' => $seed[0],
                'nome' => $seed[1],
                'sigla' => $seed[2],
            ]);
        }

        fclose($seeder);
    }
}
