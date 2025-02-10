<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $resources = [
            ['name' => 'choirs', 'label' => 'Corais'],
            ['name' => 'choristers', 'label' => 'Coralistas'],
            ['name' => 'groups', 'label' => 'Grupos'],
            ['name' => 'encounters', 'label' => 'Ensaios'],
            ['name' => 'events', 'label' => 'Eventos'],
            ['name' => 'attendances', 'label' => 'Controle de frequência'],
            ['name' => 'confirmations', 'label' => 'Confirmação em eventos'],
        ];

        Resource::insert($resources);
    }
}
