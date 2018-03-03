<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
////Load composer's autoloader
//require '../vendor/autoload.php';

namespace PHPMailer\PHPMailer;

function sendEmail($data = []){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.163.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";
    $mail->Username = "zywangzhaoyang@163.com";
    $mail->Password = "wofengle7878";
    $mail->Subject = '注册邮件';
    $mail->From = "zywangzhaoyang@163.com";
    $mail->FromName = '千源';

    if ($data && is_array($data)){
        foreach ($data as $k => $v){
            $mail->addAddress($v['user_email'],'亲');
            $mail->isHTML(true);
            $mail->Body = $v['content'];

            // 发送成功
            if($mail->send()){
                echo '发送成功';
            }else{
                echo "mail error: ".$mail->ErrorInfo;   // 输出错误信息
            }
        }
    }
}
