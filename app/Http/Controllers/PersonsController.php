<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function __invoke()
    {
        $persons = [
            [
                'id' => 1,
                'name' => 'huj',
                'age' => 15,
                'job' => 'dolbaeb'
            ],
            [
                'id' => 2,
                'name' => 'qwe',
                'age' => 20,
                'job' => 'dolbaeb'
            ],
            [
                'id' => 2,
                'name' => 'asd',
                'age' => 14,
                'job' => 'dolbaeb'
            ],
            [
                'id' => 3,
                'name' => 'zxc',
                'age' => 15,
                'job' => 'dolbaeb'
            ],
            [
                'id' => 4,
                'name' => 'rty',
                'age' => 25,
                'job' => 'dolbaeb'
            ],
            [
                'id' => 5,
                'name' => 'yui',
                'age' => 26,
                'job' => 'dolbaeb'
            ],
        ];
        return $persons;
    }
}
