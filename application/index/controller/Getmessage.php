<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/1/31
 * Time: 16:05
 */
namespace app\index\controller;
use app\index\model\Chatlist;
use app\index\model\Chatmember;
use app\index\model\Textmsg;
use app\index\model\User;
use think\Controller;
class Getmessage extends Controller
{
    //保存信息
    public function save()
    {
        $data=new Textmsg;
        $info=new Chatlist();
        $k=$info->where('cname',$_POST['cname'])->find();
        $_POST['uid']=$k->uid;
        $data->allowField(true)->save($_POST);
    }
    //获取相应聊天室未显示的信息
    public function get($maxid,$cname)
    {
        $k=new Chatlist();
        $u=$k->where('cname',$cname)->find();
        $data=new Textmsg();
        $info=$data->where('id','>',$maxid)->where('uid',$u->uid)->order('id asc')->select();
        $page_list=array();
        foreach($info as $row)
        {
            $page_list[]=$row;
        }
        echo json_encode($page_list);
    }

    public function getlist($cname)
    {
        $data=new Chatlist();
        $k=$data->where('cname',$cname)->find();
        $list=new Chatmember();
        $listmsg=$list->where('uid',$k->uid)->select();
        $info=array();
        foreach ($listmsg as $row)
        {
            $info[]=$row;
        }
        echo json_encode($info);
    }
    public function getview()
    {
        $data=new User();
        $listmsg=$data->select();
        $info=array();
        foreach ($listmsg as $row)
        {
            $info[]=$row;
        }
        echo  json_encode($info);
    }
}