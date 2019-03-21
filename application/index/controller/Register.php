<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/2/14
 * Time: 18:54
 */
namespace app\index\controller;
use app\index\model\User;
use think\Controller;
use think\Session;
class Register extends Controller
{
    //显示注册界面
    public function reg()
    {
        return $this->fetch();
    }
    //验证注册信息
    public function check()
    {
        $user=new User();
        $id=input('post.id');
        $password=input('post.password');
        $captcha=input('post.captcha');
        if(!captcha_check($captcha)){
            $this->error('验证码错误','../../index/Register/reg');
        }
        $ad=new User();
        $nad=$ad->where('username',$id)->find();
        if($nad!=null)
            $this->error('用户已注册','../../index/Register/reg');
        $user->username=$id;
        $user->password=$password;
        $user->isadmin=1;
        $user->save();
        Session::set('username',$id);
        $this->redirect('../../index/Userview/index');

    }
    //检查用户是否存在
    public function checkname($username)
    {
        $user=new User();
        $data=$user->where('username',$username)->find();
        if($data!=null)
            echo 1;
        else
            echo 0;
    }
}