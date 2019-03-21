<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/2/1
 * Time: 14:44
 */
namespace app\index\controller;
use app\index\model\Chatmember;
use think\Controller;
use app\index\model\Chatlist;
class Getlist extends Controller
{
    //获取用户创建的聊天室列表
    public function getcreate($hostname)
    {
        $data=new Chatlist();
        $info=$data->where('hostname',$hostname)->select();
        $list=array();
        foreach ($info as $row)
            $list[]=$row;
        echo json_encode($list);
    }
    //获取用户加入的聊天室列表
    public  function getadd($membername)
    {
        $data=new Chatmember();
        $info=$data->where('membername',$membername)->select();
        $list=array();
        $k=new Chatlist();
        foreach ($info as $row) {
            $j=$k->where('uid',$row->uid)->find();
            if($j->hostname!=$membername)
            {
                $row->cname=$j->cname;
                $list[] = $row;
            }
        }
        echo json_encode($list);
    }
    //用来获取用户未加入的聊天室列表
    public function getsub($membername)
    {
        $data=new Chatmember();
        $u_id=array();
        $k=new Chatlist();
        $info=$k->select();
        foreach ($info as $row)
        {
            //判断此聊天室成员有没有该成员
            if(!$data->where('uid',$row->uid)->where('membername',$membername)->find())
                $u_id[]=$row->uid;
        }
        $y=array();
        foreach ($u_id as $row)
        {
            $msg=$k->where('uid',$row)->find();
            $y[]=$msg;
        }
        echo json_encode($y);
    }
}