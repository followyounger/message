<?php


namespace app\index\controller;
//namespace PHPMailer\PHPMailer;
use think\Controller;
use think\Db;
use think\Loader;
use think\Session;
use think\Request;
use think\captcha;
//use app\index\validate\UserValidate;
use think\Validate;




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






        foreach ($infofather as $key=> $val){
            $infofather[$key]['create_time'] = date('Y-m-d H:i:s',strtotime( $infofather[$key]['create_time']));
        }
        foreach ($infochildren as $key=> $val){
            $infochildren[$key]['create_time'] = date('Y-m-d H:i:s',strtotime( $infochildren[$key]['create_time']));
        }

//        dump($infochildren);
//        dump($infofather);

//        exit;
//        $infochildrenther['create_time'] = date('Y-m-d H:i:s',strtotime($infochildren['create_time']));
        $this->assign('username',$username);
        $this->assign('infofather',$infofather);
        $this->assign('infochildren',$infochildren);
        return $this->fetch();
    }
    public function login(){
        if($_POST){
            $i = input('post.');

            $ValiInfo = [
                'name'=>$i['username'],
                'email'=>$i['password']
            ];

            $validate = new UserValidate();
//            $validate->check($ValiInfo);

            if(!$validate->check($ValiInfo)){
                dump($validate->getError());
            }


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

//        $email = new PHPMailer();

        if(request()->isPost()){
            $data = input('post.');
            $ValiInfo = [
                'username'=>$data['username'],
                'password'=>$data['password'],
                'email' => $data['user_email']
            ];
            $rule = [
                    ['username','require|max:25','名称必须|名称最多不能超过25个字符'],
                    ['password','require','密码是必须的'],
                    ['email','email','邮箱格式错误']
             ];

            $validate = new Validate($rule);
            $result = $validate->check($ValiInfo);

            if(!$result){
                echo $validate->getError();
            }
//
//            echo 1;
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
                if (!empty($file)){
                    $info = $file->validate((['ext'=>'jpg,png,gif']))->move(ROOT_PATH . 'public' . DS . 'uploads');
//                var_dump($info);
//                exit();
                    $image = $info->getSaveName();

                    $image = '/uploads/'.str_replace('\\','/',$image);
                }
//                var_dump($image);
//                exit();
//                $image = !empty($image)?$image:NULL;
                $user = Db::table('users')->insert([
                    'username' => $_POST['username'],
                    'password' => md5($_POST['password']),
                    'email' => $data['user_email'],
                    'userimg' => !empty($image)?$image:NULL
                ]);

                $res = \PHPMailer\PHPMailer\sendEmail([['user_email'=>$data['user_email'],'content'=>'资源鸟，让一切变得简单，加qq群 623918245 畅聊']]);
                if ($user){
                    return $this->success('注册成功,请检查邮箱','index');
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
