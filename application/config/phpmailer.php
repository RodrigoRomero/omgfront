<?php
/* VERSION: 2.0.0
 *
 *
 */
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */


/*$config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.argentinavision2020.com',
  'smtp_port' => 26,
  'smtp_user' => 'noreply@argentinavision2020.com',
  'smtp_pass' => 'm8mKzK2/Acn/V',
  'smtp_auth' => true,
  'mailtype' => 'html',
  'crlf' => "\r\n",
  'newline' => "\r\n"
);
*/

$config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.sendgrid.net',
  'smtp_port' => 25,
  'smtp_user' => 'orsonia',
  'smtp_pass' => 'orsonia2018',
  'smtp_auth' => true,
  'mailtype' => 'html',
  'crlf' => "\r\n",
  'newline' => "\r\n"
);

/* End of file email.php */
/* Location: ./system/application/config/email.php vnstudios2017!*/
