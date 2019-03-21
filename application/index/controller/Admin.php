<?php
/**
 * Created by PhpStorm.
 * User: LJC
 * Date: 2018/1/31
 * Time: 15:16
 */
namespace app\index\controller;
use app\index\model\User;
use think\Controller;
use think\Session;
class Admin extends Controller
{
    //显示用户登录界面
    public function admin()
    {
        return $this->fetch();
    }
    //检查用户登录信息
    public function check()
    {
        $user=new User();
        $id=input('post.id');
        $password=input('post.password');
        $captcha=input('post.captcha');
        if(!captcha_check($captcha)){
            $this->error('验证码错误','../../index/Admin/admin');
        }
        $result=$user->where('username',$id)->find();
        if($result!=null)
        {
            if($result->isadmin==1)
                $this->error('用户已登录，请先在其他地方下线！','../../index/Admin/admin');
            if($result->password==$password)
            {
                Session::set('username',$id);
                $ad=new User();
                $isa=$ad->where('username',$id)->find();
                $isa->isadmin=1;
                $isa->save();

                $this->redirect('../../index/Userview/index');
            }
            else
                $this->error('密码错误!','../../index/Admin/admin');
        }
        else
        {
            $this->error('账号不存在','../../index/Admin/admin');
        }
    }
    //用户退出登录
    public function madmin($username)
    {
        if($username!=null) {
            Session::delete('username');
            $ad = new User();
            $isa = $ad->where('username', $username)->find();
            $isa->isadmin = 0;
            $isa->save();
            $this->redirect('../../index/Admin/admin');
        }
    }
}