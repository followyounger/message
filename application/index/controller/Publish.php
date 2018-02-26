<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Publish extends Controller
{
    public function publish()
    {

        $input = input('post.');

        /*
         * 这说明是回复的儿子，当然儿子也是可以成为儿子的。
         * */
        if(!empty($input['content_c'])){
            if(Session::get('username')){

                $name = Session::get('username');
                $username = Db::table('users')->where('username','eq',$name)->find();
                $info = Db::table('message')->where('userid','eq',$input['huifu_id'])->find();

                $user = Db::table('message')->insert([
                    'content' => $input['content_c'],
                    'userid' => $username['userid'],
                    'parent_id' => $info['parent_id'],
                    'huifu_id' => $input['huifu_id'],
                    'create_at' => time()
                ]);
                if($user){
                    return $this->success('发表成功', 'index/index');
                }else{
                    return $this->error('发表失败');
                }
            }else{
                return $this->error('请重新发表或内容为空');
            }
            return $this->fetch();
        }elseif (!empty($input['content_f'])){
            if(Session::get('username')){
                $name = Session::get('username');
                $username = Db::table('users')->where('username','eq',$name)->find();
                $info = Db::table('message')->where('userid','eq',$input['huifu_id'])->find();

                $user = Db::table('message')->insert([
                    'content' => $input['content_f'],
                    'userid' => $username['userid'],
                    'parent_id' => $input['huifu_id'],
                    'huifu_id' => $input['huifu_id'],
                    'create_at' => time()
                ]);
                if($user){
                    return $this->success('发表成功', 'index/index');
                }else{
                    return $this->error('发表失败');
                }
            }else{
                return $this->error('请重新发表或内容为空');
            }
            return $this->fetch();
        }


    }
}
