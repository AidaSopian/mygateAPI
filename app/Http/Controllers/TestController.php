<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function test_query()
    {
            $data=DB::table('units')
            //->join('blocks','units.block_id','=','blocks.block_id')
            //->where('units.block_id','=','12')
            //->select('units.unit_id','blocks.block-type','blocks.status')
            ->get();

            echo "<pre>";
            print_r($data);
    }
}
