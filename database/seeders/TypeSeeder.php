<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Lavoro', 'Studio'];

        foreach($types as $type){
            $new_type = new Type();
            $new_type->type = $type;
            $new_type->slug = Str::slug($type);
            $new_type->save();
        }
    }
}
