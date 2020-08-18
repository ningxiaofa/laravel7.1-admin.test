<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'test';

     /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = [
        "learn_date",
        "learn_time",
        "learn_time_tz",
        "learn_datetime",
        "learn_datetime_tz",
        "learn_timestamp",
        "learn_timestamp_tz",
        "learn_year",
    ];
}
