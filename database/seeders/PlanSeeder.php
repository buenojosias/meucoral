<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Gratuito',
                'resources' => ['1 coral', 'Até 30 coralistas', 'Endereços', 'Responsáveis', 'Endereço e contatos', 'Comentários', 'Eventos simples'],
                'price' => 0,
            ],
            [
                'name' => 'Essencial',
                'resources' => ['Até 3 corais', 'Até 100 coralistas', 'Ensaios', 'Chamada', 'Endereço dos eventos', 'Participação nos eventos', 'Fila de espera'],
                'price' => 25,
            ],
            [
                'name' => 'Premium',
                'resources' => ['Corais ilimitados', 'Coralistas ilimitados', 'Grupos', 'Planejamento de ensaio', 'Audições', 'Classificação vocal', 'Avaliações', 'Repertório dos eventos', 'Músicas com letras', 'Categorias das músicas', 'Músicas por data comemorativa', 'Cifras e partituras'],
                'price' => 35,
            ],
            [
                'name' => 'Avançado',
                'resources' => ['Multiusuário', 'Fluxo de caixa', 'Carteiras', 'Doações', 'Fornecedores', 'Produtos', 'Compras', 'Vendas', 'Mensalidades', 'Gateway de pagamentos', 'Diagrama de apresentações'],
                'price' => 50,
            ],
            [
                'name' => 'Aplicativo',
                'resources' => ['Áudios', 'Perfis dos coralistas', 'Avatar', 'Favoritos', 'Estatísticas', 'Áudio por nipe'],
                'price' => 80,
            ],
        ];

        foreach($plans as $plan) {
            Plan::create($plan);
        }
        // Plan::insert($plans);
    }
}
