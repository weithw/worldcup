<?php
/**
 * TalkPiece  开源社区
 *
 * @author     thinkphper <service@talkpiece.com>
 * @copyright  2014  talkpiece
 * @license    http://www.talkpiece.com/license
 * @version    1.0
 * @link       http://www.talkpiece.com
 */
define('DIR_SECURE_FILENAME', 'default.html');
define('DIR_SECURE_CONTENT', 'deney Access!');
define('APP_DEBUG', true);
define('APP_NAME', 'App');
define('APP_PATH', '../App/');
if (!file_exists(APP_PATH .'Runtime/Install/install.lock')) {
	$_GET['m'] = 'install';
}
require '../ThinkPHP/bootstrap.php';