<?php

use App\Category;
use App\Genre;
use App\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'Engish'
        ]);
        $category2 = Category::create([
            'name' => 'Yoruba'
        ]);
        $category3 = Category::create([
            'name' => 'Hausa'
        ]);
        $category4 = Category::create([
            'name' => 'Igbo'
        ]);

        $genre1 = Genre::create([
            'name' => 'Romance'
        ]);
        $genre2 = Genre::create([
            'name' => 'Action'
        ]);
        $genre3 = Genre::create([
            'name' => 'Epic'
        ]);
        $genre4 = Genre::create([
            'name' => 'Drama'
        ]);
        $genre5 = Genre::create([
            'name' => 'Comedy'
        ]);
        $genre6 = Genre::create([
            'name' => 'Political'
        ]);

        $movie1 = Movie::create([
            'title' => 'Monster Man',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2014',
            'director' => 'Jim Iyke',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '147mins',
            'writer' => 'Desmond Eliot',
            'released_date' => 'January 24, 2014',
            'mmpa_rating' => 'PG-16',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category1->id,
            'poster' => 'seedsample/slider4.jpg',
        ]);

        $movie2 = Movie::create([
            'title' => 'Monster Man2',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2014',
            'director' => 'Jim Iyke',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '102mins',
            'writer' => 'Femi Adebayo',
            'released_date' => 'January 24, 2014',
            'mmpa_rating' => 'PG-14',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category2->id,
            'poster' => 'seedsample/slider3.jpg',
        ]);

        $movie3 = Movie::create([
            'title' => 'Monster Woman',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2016',
            'director' => 'Jim Iyke',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '117mins',
            'writer' => 'Jide Kosoko',
            'released_date' => 'January 24, 2016',
            'mmpa_rating' => 'PG-14',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category3->id,
            'poster' => 'seedsample/slider2.jpg',
        ]);

        $movie4 = Movie::create([
            'title' => 'Monster Lady',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2019',
            'director' => 'Desmond Eliot',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '147mins',
            'writer' => 'Funmi Martins',
            'released_date' => 'January 24, 2019',
            'mmpa_rating' => 'PG-16',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category4->id,
            'poster' => 'seedsample/slider1.jpg',
        ]);

        $movie5 = Movie::create([
            'title' => 'Monster Boy',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2011',
            'director' => 'Stella Damascus',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '120mins',
            'writer' => 'Odunlade Adekola',
            'released_date' => 'January 24, 2011',
            'mmpa_rating' => 'PG-15',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category1->id,
            'poster' => 'seedsample/slider5.jpg',
        ]);
        $movie6 = Movie::create([
            'title' => 'Monster Gang',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2008',
            'director' => 'Stella Damascus',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '147mins',
            'writer' => 'Tonto Dike',
            'released_date' => 'August 19, 2008',
            'mmpa_rating' => 'PG-15',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category2->id,
            'poster' => 'seedsample/slider4.jpg',
        ]);
        $movie7 = Movie::create([
            'title' => 'Monster Angel',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2011',
            'director' => 'Stella Damascus',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '147mins',
            'writer' => 'Saint Obi',
            'released_date' => 'May 12, 2011',
            'mmpa_rating' => 'PG-18',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category3->id,
            'poster' => 'seedsample/slider3.jpg',
        ]);
        $movie8 = Movie::create([
            'title' => 'The Arbitration',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2011',
            'director' => 'Stella Damascus',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '147mins',
            'writer' => 'Emeka Ike',
            'released_date' => 'April 23, 2011',
            'mmpa_rating' => 'PG-16',
            'youtube_code' => '96a_agrtfnU',
            'category_id' => $category4->id,
            'poster' => 'seedsample/slider2.jpg',
        ]);
        $movie9 = Movie::create([
            'title' => 'The Grudge',
            'overview' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point',
            'year' => '2011',
            'director' => 'Stella Damascus',
            'stars' => 'Desmond Eliot, Jim Iyke, Stella Damascus, Uche Jombo',
            'runtime' => '147mins',
            'writer' => 'Joel Samson',
            'released_date' => 'June 2, 2011',
            'mmpa_rating' => 'PG-13',
            'youtube_code' => 'P9e1JnBQLMQ',
            'category_id' => $category1->id,
            'poster' => 'seedsample/slider1.jpg',
        ]);

        $movie1->genres()->attach([$genre1->id, $genre2->id]);
        $movie2->genres()->attach([$genre4->id, $genre2->id]);
        $movie3->genres()->attach([$genre3->id, $genre5->id]);
        $movie4->genres()->attach([$genre6->id, $genre4->id]);
        $movie5->genres()->attach([$genre5->id, $genre1->id, $genre4->id]);
        $movie6->genres()->attach([$genre3->id, $genre4->id]);
        $movie7->genres()->attach([$genre2->id, $genre5->id]);
        $movie8->genres()->attach([$genre4->id]);
        $movie9->genres()->attach([$genre1->id, $genre6->id]);
    }
}
