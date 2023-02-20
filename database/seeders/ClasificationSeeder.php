<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clasification;

class ClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasifications= [
            ['name'=>'MTB'],
            ['name'=>'ROUTE'],
            ['name'=>'TRIATHLON'],
            ['name'=>'CLAS1'],
            ['name'=>'CLAS2'],
            ['name'=>'OTHER'],
        ];
        foreach($clasifications as $c){
            Clasification::create($c);
        }
    }
}
