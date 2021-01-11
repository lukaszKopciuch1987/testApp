<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $exampleData = [
        [
            'id'        => 1,
            'text'      => 'Countries',
            'parent_id' => 0,
            'position'  => 0,
            ],
        [
            'id'    => 2,
            'text'  => 'Europe',
            'parent_id' => 1,
            'position'  => 0
        ],
        [
            'id'    => 3,
            'text'  => 'Australia',
            'parent_id' => 1,
            'position'  => 1
        ],
        [
            'id'    => 4,
            'text'  => 'South America',
            'parent_id' => 1,
            'position'  => 2
        ],
        [
            'id'    => 5,
            'text'  => 'North America',
            'parent_id' => 1,
            'position'  => 3
        ],
        [
            'id'    => 6,
            'text'  => 'Asia',
            'parent_id' => 1,
            'position'  => 4
        ],
        [
            'id'    => 7,
            'text'  => 'Africa',
            'parent_id' => 1,
            'position'  => 6
        ],
        [
            'id'    => 8,
            'text'  => 'Poland',
            'parent_id' =>2,
            'position'  => 0
        ],
        [
            'id'    => 9,
            'text'  => 'Warszawa',
            'parent_id'  =>8,
            'position'  => 0
        ],
        [
            'id'    => 10,
            'text'  => 'Lublin',
            'parent_id' => 8,
            'position'  => 1
        ],
        [
            'id'    => 11,
            'text'  => 'Kraków',
            'parent_id' => 8,
            'position'  => 2
        ],
        [
            'id'    => 30,
            'text'  =>'Canada',
            'parent_id'    => 5,
            'position'  => 0
        ],
        [
            'id'    => 31,
            'text'  => 'Mexico',
            'parent_id' =>5,
            'position'  => 1
        ],
        [
            'id'    => 32,
            'text'  => 'Argentina',
            'parent_id' => 4,
            'position'  => 0
        ],
        [
            'id'    => 33,
            'text'  => 'Brazil',
            'parent_id' => 4,
            'position'  => 1
        ],
        [
            'id'    =>34,
            'text'  => 'Chile',
            'parent_id' => 4,
            'position'  => 2
        ],
        [
            'id'    => 36,
            'text'  => 'Germany',
            'parent_id' => 2,
            'position'  => 0
        ],
        [
            'id'    => 37,
            'text'  => 'France',
            'parent_id' => 2,
            'position'  => 1],
        [
            'id'    => 38,
            'text'  => 'Canberra',
            'parent_id' => 3,
            'position'  => 0
        ],
        [
            'id'    =>39,
            'text'  => 'Sydney',
            'parent_id' =>3,
            'position'  => 1
        ],
        [
            'id'    => 40,
            'text'  => 'Hong Kong',
            'parent_id' => 6,
            'position'  => 0
        ],
        [
            'id'    => 41,
            'text'  => 'Japan',
            'parent_id' => 6,
            'position'  => 1
        ],
        [
            'id'    => 42,
            'text'  => 'India',
            'parent_id' => 6,
            'position'  => 2
        ],
        [
            'id'    => 43,
            'text'  => 'Tanzania',
            'parent_id' => 7,
            'position'  => 0
        ],
        [
            'id'    =>44,
            'text'  => 'Egypt',
            'parent_id' => 7,
            'position'  => 1],
        [
            'id'    => 45,
            'text'  => 'Ethiopia',
            'parent_id' => 7,
            'position'  => 2
        ],
        [
            'id'    => 46,
            'text'  => 'United States',
            'parent_id' => 5,
            'position'  => 0],
        [
            'id'    => 47,
            'text'  => 'New York',
            'parent_id' => 46,
            'position'  => 0
        ],
        [
            'id'    => 48,
            'text'  => 'Washington',
            'parent_id'    => 46,
            'position'  => 1
        ],
        [
            'id'    => 49,
            'text'  => 'Dairut',
            'parent_id' => 44,
            'position'  => 0],
        [
            'id'    => 50,
            'text'  => 'Giza',
            'parent_id' =>44,
            'position'  => 1
        ]
    ];

    public function run()
    {
        foreach($this->exampleData as $data){
                DB::table('users')->insert([
                    'id' => $data['id'],
                    'parent_id' => $data['parent_id'],
                    'text' => $data['text'],
                    'position'  => $data['position']
                ]);

        }
    }
}
