<?php

namespace App\Http\Controllers;

use App\Builders\TableBuilder;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $table = new TableBuilder;

        echo $table
            ->style('border: 1px;')
            ->head(['#', 'Name', 'Phone'])
            ->data([[
                    'id' => 1,
                    'name' => 'Hafiz',
                    'phone' => '01689553434'
                ]
            ])
            ->render();


    }
}
