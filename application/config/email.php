<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_user'] = 'info@tuindicedigital.com';
$config['smtp_pass'] = 'ubuntu123';
$config['smtp_port'] = '465';
$config['smtp_timeout'] = '5';
$config['mailtype'] = 'html';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";  
$config['charset'] = 'utf-8';


/* End of file email.php */
/* Location: ./application/config/email.php */