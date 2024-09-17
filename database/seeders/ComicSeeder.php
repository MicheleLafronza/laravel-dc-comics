<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creo variabile con i tutti dati contenuti nel file config
        $comics = config('comics');

        // ciclo for each per immettere tutti i dati nel seeder
        foreach ($comics as $comic) {
            $newComic = new Comic();
            $newComic->slug = Helper::generateSlug($comic['title'], Comic::class);
            $newComic->fill($comic);
            $newComic->save();

        }

    }
}
