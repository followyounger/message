<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/5 0005
 * Time: 下午 2:27
 */

namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Session;

class Users extends Controller
{
    public function index(){

        $username = Session::get('username');


        $userinfo = Db::table('users')->where('username','eq',$username)->find();

        $userinfo['password'] = substr($userinfo['password'],0,6);
        $this->assign('userinfo',$userinfo);
        return $this->fetch();
    }

    public function changepassword(){
        $input = input('post.');
        $username = Session::get('username');
        $userinfo = Db::table('users')->where('username','eq',$username)->find();
        if (md5($input['oldpassword'])==$userinfo['password']){
            if($input['newpassword']==$input['confpassword']){
                Db::table('users')->where('username','eq',$username)->update(['password'=>md5($input['newpassword'])]);
                return $this->success('修改密码成功','index');
            }else{
                return $this->error('两次输入的密码不匹配','index');
            }
        }else{
            return $this->error('修改密码失败','index');
        }

    }

    public function about(){

//        return $this->redirect('about');
        return $this->fetch();
    }
}