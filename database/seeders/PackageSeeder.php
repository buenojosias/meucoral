<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [ 'name' => 'Grátis', 'resources' => json_encode([ 'foo' => 'bar' ]), 'price' => 0 ],
            [ 'name' => 'Básico', 'resources' => json_encode([ 'foo' => 'bar' ]), 'price' => 20 ],
            [ 'name' => 'Plus', 'resources' => json_encode([ 'foo' => 'bar' ]), 'price' => 7 ],
        ];

        Package::insert($packages);
    }
}
