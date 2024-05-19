<?php

namespace Database\Seeders;

use App\Models\Constant;
use Illuminate\Database\Seeder;

class ConstantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constant::updateOrCreate(['key'=>'AREAS'],['key'=>'AREAS','value'=>'المناطق']);
    }
}
