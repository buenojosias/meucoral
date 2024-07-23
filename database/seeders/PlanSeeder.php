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
                'resources' => ['choirs_limit' => 1, 'choiristers_limit' => 30, 'Endereços', 'Responsáveis', 'Endereço e contatos', 'Comentários'],
                // 'resources' => ['1 coral', 'Até 30 coralistas', 'Endereços', 'Responsáveis', 'Endereço e contatos', 'Comentários'],
                'price' => 0,
            ],
            [
                'name' => 'Básico',
                'resources' => ['choirs_limit' => 3, 'choiristers_limit' => 100, 'Ensaios', 'Chamada', 'Eventos', 'Participação nos eventos', 'Fila de espera'],
                // 'resources' => ['Até 3 corais', 'Até 100 coralistas', 'Ensaios', 'Chamada', 'Eventos', 'Participação nos eventos', 'Fila de espera'],
                'price' => 25,
            ],
            [
                'name' => 'Intermediário',
                'resources' => ['choirs_limit' => null, 'choiristers_limit' => null, 'Grupos', 'Planejamento de ensaio', 'Classificação vocal', 'Avaliações', 'Músicas com letras', 'Categorias das músicas', 'Músicas por data comemorativa'],
                // 'resources' => ['Corais ilimitados', 'Coralistas ilimitados', 'Grupos', 'Planejamento de ensaio', 'Classificação vocal', 'Avaliações', 'Músicas com letras', 'Categorias das músicas', 'Músicas por data comemorativa'],
                'price' => 35,
            ],
            [
                'name' => 'Avançado',
                'resources' => ['choirs_limit' => null, 'choiristers_limit' => null, 'Multiusuário', 'Fluxo de caixa', 'Carteiras', 'Doações', 'Fornecedores', 'Produtos', 'Compras', 'Vendas', 'Mensalidades', 'Gateway de pagamentos', 'Diagrama de apresentações'],
                // 'resources' => ['Multiusuário', 'Fluxo de caixa', 'Carteiras', 'Doações', 'Fornecedores', 'Produtos', 'Compras', 'Vendas', 'Mensalidades', 'Gateway de pagamentos', 'Diagrama de apresentações'],
                'price' => 50,
            ],
            [
                'name' => 'Aplicativo',
                'resources' => ['choirs_limit' => null, 'choiristers_limit' => null, 'Áudios', 'Perfis dos coralistas', 'Avatar', 'Favoritos', 'Estatísticas', 'Áudio por nipe'],
                // 'resources' => ['Áudios', 'Perfis dos coralistas', 'Avatar', 'Favoritos', 'Estatísticas', 'Áudio por nipe'],
                'price' => 80,
            ],
        ];

        foreach($plans as $plan) {
            Plan::create($plan);
        }
        // Plan::insert($plans);
    }
}
