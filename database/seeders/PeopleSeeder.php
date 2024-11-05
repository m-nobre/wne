<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


use App\Models\Author;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        try {

            /* Author */

            try {

                Author::firstOrCreate([
                    'name'                 => 'Mar Yo'   
                ], [
                    'shortbio'             => 'Webdeginer, Musician, Event Faciltator and Permaculture designer / consultant',
                    'longbio'              => "Mar Yo is a Webdeginer, Musician, Event Faciltator and Permaculture designer / consultant with years of experience in each of his fields",
                    'image'                => "https://images.pexels.com/photos/6206963/pexels-photo-6206963.jpeg",
                    'website'              => "www.maz.pt",
                    'email'                => "me@maz.pt",
                    'slug'                 => Str::slug('Mar Yo'),
                ]);
    
                Log::channel('stderr')->info("Author seeded");

    
            } catch (\Throwable $th) {
                Log::channel('stderr')->error("Author populating error - {$th}");
            }


        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
