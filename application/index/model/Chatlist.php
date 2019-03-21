<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/2/1
 * Time: 14:39
 */
namespace app\index\model;
use think\Model;

class Chatlist extends Model
{
    public function comments()
    {
        return $this->hasMany('Chatmember','uid');
    }
}