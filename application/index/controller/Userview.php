<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/2/1
 * Time: 13:07
 */
namespace app\index\controller;
use app\index\model\Chatlist;
use app\index\model\Chatmember;
use think\Controller;
use think\Session;

class Userview extends Controller
{
    //显示主界面
    public function index()
    {
        if(Session::has('username')) {
            $this->assign('username',Session::get('username'));
            return $this->fetch('userview');
        }
        else
            $this->error('用户未登录!!!','../../index/Admin/admin');
    }
    //创建聊天室
    public function addnewroom($hostname)
    {
        $data=new Chatlist();
        $data->cname=input('post.cname');
        $data->hostname=$hostname;
        $data->save();
        echo $data->uid;
        $uid=$data->uid;
        $info=new Chatmember();
        $info->uid=$uid;
        $info->membername=$hostname;
        $info->save();
    }
}