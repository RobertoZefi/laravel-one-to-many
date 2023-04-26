<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            $project = new Project(); 

            $project->title = $faker->unique()->sentence($faker->numberBetween(3, 5));
            $project->client = $faker->text(20);
            $project->description = $faker->text();
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
