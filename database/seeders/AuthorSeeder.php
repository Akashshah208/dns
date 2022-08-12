<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            [
                'name' => 'Author 1',
                'profile' => '1.jpg',
                'work' => 'Work 1',
                'description' => 'Description 1',
            ],
            [
                'name' => 'Author 2',
                'profile' => '2.jpg',
                'work' => 'Work 2',
                'description' => 'Description 2',
            ],
            [
                'name' => 'Author 3',
                'profile' => '3.jpg',
                'work' => 'Work 3',
                'description' => 'Description 3',
            ],
            [
                'name' => 'Author 4',
                'profile' => '4.jpg',
                'work' => 'Work 4',
                'description' => 'Description 4',
            ],
            [
                'name' => 'Author 5',
                'profile' => '5.jpg',
                'work' => 'Work 5',
                'description' => 'Description 5',
            ],
        ];

        foreach ($authors as $author) {

            $authorObj = new Author();
            $authorObj->name = $author['name'];
            $authorObj->profile = $author['profile'];
            $authorObj->work = $author['work'];
            $authorObj->description = $author['description'];
            $authorObj->save();

        }
    }
}
