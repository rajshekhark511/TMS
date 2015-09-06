<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */

//Photo upload
$current_dir=dirname(__DIR__);
define('PHOTO_UPLOAD_PATH',  str_replace('application', 'images', $current_dir));

/*  TABLES  */
define('CUSTOM_ENCRYPT','0ab101fcdd760e4bfc880fa96ebcf618');
define('PER_PAGE','3');
define('TBL_USER','tbl_user');
define('TBL_STATES','tbl_state');
define('TBL_DISTRICT','tbl_district');
define('TBL_CITY','tbl_city');
define('TBL_INSTITUTE','tbl_institute');
define('TBL_ROLES','tbl_roles');
define('TBL_LOG','tbl_log');
define('TBL_BRANCHES','tbl_branches');
define('TBL_BATCHES','tbl_batches');
define('TBL_STANDARD','tbl_standard');
define('TBL_POST','tbl_post');
define('TBL_SUBJECT','tbl_subject');
define('TBL_TEACHER','tbl_teacher');
define('TBL_STUDENT','tbl_student');
define('TBL_PARENT','tbl_parent');
define('TBL_FEEDBACK','tbl_feedback');