<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
date_default_timezone_set("Asia/Shanghai");
// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');


define('URL_JS',  '/../static/js/');
define('URL_CSS',  '/../static/css/');
define('URL_IMG',  '/../static/images/');
define('URL_HUI',  '/../static/hui/');

define('URL_BOOT', '/../static/bootstrap/');

define('URL_UED', '/../static/uediter/');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
