<?php
/*
 * Generated configuration file
 * Generated by: phpMyAdmin 4.8.3 setup script
 * Date: Sat, 27 Oct 2018 05:05:57 +0000
 */

/* Servers configuration */
$i = 0;

/* Server: SQL [1] */
$i++;
$cfg['Servers'][$i]['verbose'] = 'SQL';
$cfg['Servers'][$i]['host'] = 'mysql'; //docker version is mysql and native install version is localhost
$cfg['Servers'][$i]['port'] = 3306;
$cfg['Servers'][$i]['socket'] = '';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['user'] = '';
$cfg['Servers'][$i]['password'] = '';
$cfg['Servers'][$i]['AllowRoot'] = false;
$cfg['Servers'][$i]['ssl'] = false;
$cfg['Servers'][$i]['compress'] = true;

/* End of servers configuration */

$cfg['CSPAllow'] = 'ajax.cloudflare.com';
$cfg['blowfish_secret'] = 'WiyOT/JD$rlX}"<kA2r!Ej}1uF:XYL?E';
$cfg['DefaultLang'] = 'en';
$cfg['ServerDefault'] = 1;
$cfg['SendErrorReports'] = 'never';
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
$cfg['CaptchaLoginPublicKey'] = ''; //register invsible recapcha for your domain and paste keys
$cfg['CaptchaLoginPrivateKey'] = '';
$cfg['ExecTimeLimit'] = 3000;
$cfg['QueryHistoryMax'] = 9000;
$cfg['QueryHistoryDB'] = true;
$cfg['Export']['method'] = 'custom';
$cfg['Export']['compression'] = 'zip';
$cfg['ZeroConf'] = 'false';
?>
