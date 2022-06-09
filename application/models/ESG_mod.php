<?php
/* VERSION: 2.0.0
 *
 *
 */

class EmailSG_mod extends RR_Model {
        private $config;
        private $CI;
        private $email;
        function __construct() {
                parent::__construct();
                $this->CI =& get_instance();
                $this->CI->load->config('phpmailer', TRUE);
                $this->prefs = $this->CI->config->item('phpmailer');

                $this->email = new \PHPMailer\PHPMailer\PHPMailer();
                $this->email->isSMTP();
                $this->email->SMTPDebug = 4;
                $this->email->Host = 'smtp.sendgrid.net';
                $this->email->Port = 465;
                //$this->email->SMTPAutoTLS = true;
                $this->email->SMTPSecure = true;
                $this->email->SMTPAuth = true;
                $this->email->Username = 'apikey';
                $this->email->Password = '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';


        }



        function send($from, $to, $subject, $body, $extra=array()){
                if(count(explode("@", $from))==2){
                        $from = $from_desc = $from;
                } else {
                        $f         = $this->env->getEnv($from);
                        $from      = $f->lang->{$this->Clang}->valor;
                        $from_desc = $f->lang->{$this->Clang}->descripcion;
                };




                $from      = "rodrigo.romero@bennu.tv";
                $html      = $this->view("email/template", array("body"=>$body, "extra"=>$extra));

                #echo $from;
                #echo $html;

                $this->email->setFrom($from, $from_desc);
                $this->email->clearAddresses();
                $this->email->addAddress($to);

                /*if(!isset($extra['bcc_no'])) {
                        $this->email->bcc($from);
                }*/

                //if(isset($extra["cc"]))  $this->email->cc($extra["cc"]);
                //$this->email->set_mailtype('html');
                $this->email->Subject = utf8_decode($subject);
                $this->email->msgHTML($html);
                return $this->email->send();

        }

}

?>
