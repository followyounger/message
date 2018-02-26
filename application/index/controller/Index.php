<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Loader;
use think\Session;
use think\Request;
use think\captcha;


class Index extends Controller
{
    public function index()
    {
        $infofather = Db::table('message')->alias('a')->join('users b','a.userid=b.userid')->where('parent_id','=',0)->select();
        $infochildren = Db::table('message')->alias('a')->join('users b','a.userid=b.userid')->where('parent_id','<>',0)->select();

//        var_dump(json_encode($infofather));
//        var_dump(json_encode($infochildren));

        $susername = Session::get('username');
        $userinfo = Db::table('users')->where('username','=',$susername)->find();
        $this->assign('userinfo',$userinfo);

        $username = Db::table('users')->select();

        $this->assign('username',$username);
        $this->assign('infofather',$infofather);
        $this->assign('infochildren',$infochildren);
        return $this->fetch();
    }
    public function login(){
        if($_POST){
            $i = input('post.');
//            var_dump($i);
//            exit();
            if(!captcha_check($i['captcha'])){

                $this->error('验证码错误');
            };

//            var_dump(1);
//
//            exit();

            $username = Db::table('users')->where('username','=',$_POST['username'])->find();
            if ($username){
                if ($username['password']==md5($_POST['password'])){
//                   Session::init();
                   Session::set('username',$username['username']);
                    return $this->success('登陆成功','index');
                }else{
                    return $this->error('登录失败','login');
                }
            }else{
                return $this->success('用户不存在，请重新登录','index');
            }
        }

        return $this->fetch();
    }

    public function loginout(){
//        Session::destroy();
        Session::set('username',null);
        return $this->success('','login');
    }


    public function register(){

//        return $this->fetch();
//


        if(request()->isPost()){
            $data = input('post.');
//            dump($data);
//            exit;
            if(!isset($data['username'])){
                return $this->error('用户名不能为空，请重新输入');
            }
            if (!isset($data['password'])||!isset($data['repassword'])){
                return $this->error('密码不能为空，请重新输入');
            }
            if ($data['password']!=$data['repassword']){
                return $this->error('两次输入密码必须相同，请重新输入');
            }else{
                $file = request()->file('image');
                $info = $file->validate((['ext'=>'jpg,png,gif']))->move(ROOT_PATH . 'public' . DS . 'uploads');
//                var_dump($info);
//                exit();
                $image = $info->getSaveName();

                $image = '/uploads/'.str_replace('\\','/',$image);
//                var_dump($image);
//                exit();
                $user = Db::table('users')->insert([
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password']),
                    'userimg' => $image
                ]);
                if ($user){
                    return $this->success('注册成功','index');
                }else{
                    return $this->error('注册失败');
                }
            }

        }else{
            return $this->fetch();
        }
    }

    public function messageDel($userid,$huifu,$parent){

        Db::table('message')->where('userid','=',$userid)
            ->where('huifu_id','=',$huifu)
            ->where('parent_id','=',$parent)->delete();
    }

}
