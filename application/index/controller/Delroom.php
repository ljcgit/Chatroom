<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/2/1
 * Time: 18:34
 */
namespace app\index\controller;
use app\index\model\Chatlist;
use app\index\model\Chatmember;
use app\index\model\Textmsg;
use think\Controller;
class Delroom extends Controller
{
    //解散聊天室
    public function deleteroom($uid)
    {
        $x1=new Chatlist();
        $x1->where('uid',$uid)->delete();
        $x2=new Chatmember();
        $x2->where('uid',$uid)->delete();
        $x3=new Textmsg();
        $x3->where('uid',$uid)->delete();
    }
    //退出聊天室
    public function quitroom($uid,$membername)
    {
        $data=new Chatmember();
        $data->where('uid',$uid)->where('membername',$membername)->delete();
    }
    //加入聊天室
    public function addroom($uid,$membername)
    {
        $data=new Chatmember();
        $data->uid=$uid;
        $data->membername=$membername;
        $data->save();
    }
}