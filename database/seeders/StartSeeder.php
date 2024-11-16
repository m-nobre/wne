<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\Language;
use App\Models\Genre;
use App\Models\MediaType;
use App\Models\PublicationStatus;
use Illuminate\Support\Str;


class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       try {
        
            /* Language */

            try {

                Language::firstOrCreate([
                    'name'                   => 'Portugues'   
                ], [
                    'description'             => 'Europeu',
                    'slug'                   => Str::slug('Português'),
                ]);
    
                Language::firstOrCreate([
                    'name'                   => 'Inglês'   
                ], [
                    'description'             => 'Europeu',
                    'slug'                   => Str::slug('Inglês'),
                ]);

                Log::channel('stderr')->info("Language seeded");

    
            } catch (\Throwable $th) {
                Log::channel('stderr')->error("Language populating error - {$th}");
            }
            
            /* Genre */

            try {

                Genre::firstOrCreate([
                    'name'                   => 'Auto-Conhecimento'   
                ], [
                    'description'             => 'Conhecimento do Si',
                    'slug'                   => Str::slug('Auto-Conhecimento'),
                ]);
    
                Genre::firstOrCreate([
                    'name'                   => 'Conhecimento Geral'   
                ], [
                    'description'             => 'Conhecimento em geral',
                    'slug'                   => Str::slug('Conhecimento Geral'),
                ]);

                Log::channel('stderr')->info("Genre seeded");

    
            } catch (\Throwable $th) {Log::channel('stderr')->error("Genre populating error - {$th}");}
                        
            /* Media Types */

            try {

                MediaType::firstOrCreate([
                    'name'                   => 'Hard Cover'   
                ], [
                    'description'             => 'Premium',
                    'slug'                   => Str::slug('Hard Cover'),
                ]);
    
                MediaType::firstOrCreate([
                    'name'                   => 'Soft Cover'   
                ], [
                    'description'             => 'Standard',
                    'slug'                   => Str::slug('Soft Cover'),
                ]);
    
                MediaType::firstOrCreate([
                    'name'                   => 'Audio'   
                ], [
                    'description'             => 'Mp3',
                    'slug'                   => Str::slug('Audio'),
                ]);
    
                MediaType::firstOrCreate([
                    'name'                   => 'E-book'   
                ], [
                    'description'             => 'PDF',
                    'slug'                   => Str::slug('E-book'),
                ]);

                Log::channel('stderr')->info("MediaType seeded");

    
            } catch (\Throwable $th) {Log::channel('stderr')->error("MediaType populating error - {$th}");}

            /* Publication Status */

            try {

                PublicationStatus::firstOrCreate([
                    'name'                   => 'Published'   
                ], [
                    'description'             => 'For sale',
                    'slug'                   => Str::slug('Published'),
                ]);

                PublicationStatus::firstOrCreate([
                    'name'                   => 'Pre-Release'   
                ], [
                    'description'             => 'Not for sale yet.',
                    'slug'                   => Str::slug('Pre-Release'),
                ]);

                PublicationStatus::firstOrCreate([
                    'name'                   => 'Awating Release'   
                ], [
                    'description'             => 'Awating Release',
                    'slug'                   => Str::slug('Awating Release'),
                ]);

                Log::channel('stderr')->info("PublicationStatus seeded");

    
            } catch (\Throwable $th) {Log::channel('stderr')->error("PublicationStatus populating error - {$th}");}

            Log::channel('stderr')->info("Start seeded");

        } catch (\Throwable $th) {Log::channel('stderr')->error("Start Seed error - {$th}");}
    }
}
