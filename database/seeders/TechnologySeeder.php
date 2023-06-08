<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['mobile', 'app', 'web app', 'desktop'];

        foreach ($technologies as $technology_value) {
            $new_technology = new Technology();
            $new_technology->name = $technology_value;
            $new_technology->slug = Str::slug($technology_value);
            $new_technology->save();
        }
    }
}
