<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ql_khachhang extends Model
{
    protected $table = 'ql_khachhang';

    public function addInfo($data)
    {
        self::insertGetId($data);
    }




}
