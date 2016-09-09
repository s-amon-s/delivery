<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['useragent']      = 'CodeIgniter';        
$config['smtp_host']      = 'mail.geetaanjali.com';
$config['smtp_user']      = 'amon@geetaanjali.com';
$config['smtp_pass']      = 'Radhe978';
$config['smtp_port']      = 25;
$config['smtp_timeout']  = 5;
$config['smtp_crypto']    = 'ssl';                       // '' or 'tls' or 'ssl'
$config['smtp_debug']     = 0;                        // PHPMailer's SMTP debug info level: 0 = off, 1 = commands, 2 = commands and data, 3 = as 2 plus connection status, 4 = low level data output.
$config['wordwrap']       = true;
$config['wrapchars']     = 76;
$config['mailtype']       = 'html';                   // 'text' or 'html'
$config['charset']        = 'UTF-8';                     // 'UsTF-8', 'ISO-8859-15', ...; NULL (preferable) means config_item('charset'), i.e. the character set of the site.
$config['validate']       = true;
$config['priority']       = 3;                        // 1, 2, 3, 4, 5; on PHPMailer useragent NULL is a possible option, it means that X-priority header is not set at all, see https://github.com/PHPMailer/PHPMailer/issues/449
$config['crlf']           = "\n";                     // "\r\n" or "\n" or "\r"
$config['newline']        = "\n";                     // "\r\n" or "\n" or "\r"
$config['bcc_batch_mode'] = false;
$config['bcc_batch_size'] = 200;
$config['encoding']      = '8bit';   

// $this->email->initialize($config);	

