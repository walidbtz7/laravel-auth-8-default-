<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => "Moteur",
             'picture'=>"MOTEUR.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "SUSPENSION",
             'picture'=>"SUSPENSION.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "SELETTE",
             'picture'=>"sellete.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "ECHAPPEMENT",
             'picture'=>"ECHAPPEMENT.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "EMBRAYAGE",
             'picture'=>"EMBRAYAGE.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "ACCESSOIRES",
             'picture'=>"accessoires.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "FREINS",
             'picture'=>"FRIENS.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "COMPRESSEUR",
             'picture'=>"COMPRESSEUR.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "REFROIDISSEMENT",
             'picture'=>"Refroidissement moteur.jpg"
        ]);
        DB::table('categories')->insert([
            'title' => "SYSTEME ELECTRIQUE",
             'picture'=>"Système électrique.jpg"
        ]);

    }
}
