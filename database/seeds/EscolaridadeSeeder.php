<?php

use App\Models\Escolaridade;
use Illuminate\Database\Seeder;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Escolaridade::ROLE_LABELS as $key => $value) {
            Escolaridade::create([
                'id' => $key,
                'descricao' => $value,
            ]);
        }
    }
}
