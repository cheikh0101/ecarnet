<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicaments')->insert([
            [
                'nom' => 'Aspirine',
                'quantite_stock' => 100,
            ],
            [
                'nom' => 'Fervex',
                'quantite_stock' => 100,
            ],
            [
                'nom' => 'Paracetamol',
                'quantite_stock' => 100,
            ],
            [
                'nom' => 'Doliprane',
                'quantite_stock' => 100,
            ],
            [
                'nom' => 'Aspegic',
                'quantite_stock' => 100,
            ],
        ]);
    }
}
