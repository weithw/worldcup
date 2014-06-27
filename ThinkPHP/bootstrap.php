<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// ThinkPHP 入口文件
// 记录开始运行时间
$GLOBALS['_beginTime'] = microtime(TRUE);
// 记录内存初始使用
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));

if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage(); //返回分配给 PHP 的内存量
// 系统目录定义
defined('THINK_PATH') 	or define('THINK_PATH', dirname(__FILE__).'/');
defined('APP_PATH') 	or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');
defined('APP_DEBUG') 	or define('APP_DEBUG',false); // 是否调试模式


defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH.'Runtime/');
$runtime = defined('MODE_NAME')?'~'.strtolower(MODE_NAME).'_runtime.php':'~runtime.php';
//echo "runtime: " . $runtime;
defined('RUNTIME_FILE') or define('RUNTIME_FILE',RUNTIME_PATH.$runtime);
//echo "APP_DEBUG: ". APP_DEBUG;
if(!APP_DEBUG && is_file(RUNTIME_FILE)) {
    // 部署模式直接载入运行缓存
    require RUNTIME_FILE;
}else{
    // 加载运行时文件
    require THINK_PATH.'Common/runtime.php';
}

