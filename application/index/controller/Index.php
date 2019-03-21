<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
class Index extends Controller
{
    //显示聊天室界面
    public function index($cname='')
    {
        if (Session::has('username')) {
            $this->assign('cname', $cname);

            $this->assign('username', Session::get('username'));
            return $this->fetch();
        } else
            $this->error('用户未登录!!!', '../../index/Admin/admin');
    }
}
