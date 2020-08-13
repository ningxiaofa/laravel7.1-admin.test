<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class DateTimeController extends Controller
{
    public function get(){
        // return csrf_token(); // pk57g76kuM3Toce8HFqpmRB6auTB9Q1b458ZpTFI
        return 'get';
    }

    public function save(){
        // return 'save'; //测试接口
        $rows = Test::all();
        
        // var_dump($rows);
        $row =  $rows[0];
        if(is_string($row['learn_datetime'])){
            return $row['learn_datetime'];
        }
        return $row;
    }
}
