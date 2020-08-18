<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class DateTimeController extends Controller
{
    public function get(){
        // return csrf_token(); // pk57g76kuM3Toce8HFqpmRB6auTB9Q1b458ZpTFI
        $rows = Test::all();
        return $rows;
        // $row =  $rows[0];
        //  if(is_string($row['learn_datetime'])){
        //     return $row['learn_datetime'];
        // }
        // return $row;
    }

    // 测试保存数据
    public function save(Request $request){
        // return 123;
        // 测试数据
        $params = [
            "learn_date" => "2020-08-18",
            "learn_time" => "19:45:26",
            "learn_time_tz" => "19:45:29",
            "learn_datetime" => "2020-08-14 19:45:46",
            "learn_datetime_tz" => "2020-08-14 19:45:45",
            "learn_timestamp" => "2020-08-14 19:45:49",
            "learn_timestamp_tz" => "2020-08-14 19:45:51",
            "learn_year" => 2020,
            "created_at" => "2020-08-14T11:46:06.000000Z",
            "updated_at" => "2020-08-14T11:46:09.000000Z",
        ];
        // $params = $request->all();
        $test = Test::create($params);
        $ret = $test->save(); //true
        if($ret){
            return [
                'status' => 1,
                'message' => 'success',
                'data' => $ret
            ];
        }
    }
}
