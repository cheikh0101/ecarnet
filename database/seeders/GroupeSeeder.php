<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupes')->insert([
            [
                'code' => 'doc',
                'name' => 'Docteur',
            ],
            [
                'code' => 'recep',
                'name' => 'Réceptionnaiste',
            ],
            [
                'code' => 'pat',
                'name' => 'Patient',
            ],
        ]);
    }
}
