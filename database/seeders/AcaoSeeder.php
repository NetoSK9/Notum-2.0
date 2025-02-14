<?php

namespace Database\Seeders;

use App\Models\Acao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Acao::factory()->create(['titulo' => 'Integra BCC', 'data_inicio' => '2022-01-01',
                                'data_fim' => '2022-01-05', 'natureza_id' => '1', 'usuario_id' => '1',
                                'unidade_administrativa_id' => '1']);
    }
}
