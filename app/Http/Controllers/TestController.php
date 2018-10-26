<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    function test_query()
    {
        $data=DB::table('unit_user')
            ->join('society', 'society.s_id', '=', 'unit_user.s_id')
            //->select('society.name', 'unit_user.time_in')
            ->get();

        //echo"<pre>";
        print_r($data);
    }
}
