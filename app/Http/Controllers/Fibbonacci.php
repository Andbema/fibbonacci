<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class Fibbonacci extends BaseController
{

    public $fibbonacci;

    public function get_index( Request $request )
    {

        $data = json_decode(request()->getContent(), true);

        $index_number = $data['index'];

        $fibbonacci_index_number = $this->fibbonacci($index_number);

        return response()
        ->json([
            'Index_selected' => $index_number,
            'fibbonacci_number' => $fibbonacci_index_number
               ]);

    }

    public function fibbonacci( $index_number )
    {

        $this->fibonacci  = [0,1];

        for( $i = 2; $i <= $index_number; $i++){

            $this->fibonacci[] = $this->fibonacci[$i-1]+$this->fibonacci[$i-2];

        }

        return $this->fibonacci[$index_number];

    }





    
}
