<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'serie' => "Moteur",
            'categorie_id'=>1,
             'file'=>"MOTEUR.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "SUSPENSION",
            'categorie_id'=>1,

             'file'=>"SUSPENSION.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "SELETTE",
            'categorie_id'=>1,

             'file'=>"sellete.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "ECHAPPEMENT",
            'categorie_id'=>1,

             'file'=>"ECHAPPEMENT.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "EMBRAYAGE",
            'categorie_id'=>1,

             'file'=>"EMBRAYAGE.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "ACCESSOIRES",
            'categorie_id'=>1,

             'file'=>"accessoires.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "FREINS",
            'categorie_id'=>1,

             'file'=>"FRIENS.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "COMPRESSEUR",
            'categorie_id'=>1,

             'file'=>"COMPRESSEUR.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "REFROIDISSEMENT",
            'categorie_id'=>1,

             'file'=>"Refroidissement moteur.jpg"
        ]);
        DB::table('products')->insert([
            'serie' => "SYSTEME ELECTRIQUE",
            'categorie_id'=>1,

             'file'=>"Système électrique.jpg"
        ]);
    }
}
