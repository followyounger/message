<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27 0027
 * Time: 上午 8:45
 */

namespace app\index\validate;


use think\Validate;
use think\Request;
use think\exception;


class UserValidate extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:25|token',
        'password'  =>  'require|min:6',
        'email' => 'require|email'
    ];

    protected $message = [
       'username.max'=> '名称必须|名称最多不能超过25个字符',
        'username.require'=> '名称必须',
        'password.require' => '密码长度必须超过6',
        'email.require' => '必须输入邮箱'
    ];



    public function goCheck()
    {
        // 获取http传入的参数
        // 对这些参数做检验
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);
        if(!$result){
            $e = new Exception([
                'msg' => $this->error,
            ]);
            throw $e;
        }
        else{
            return true;
        }
    }
}