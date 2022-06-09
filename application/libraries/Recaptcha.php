<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);


class Recaptcha {

	public function __construct(){
		$this->CI =& get_instance();

	}


	public function validate($token){
        
        $secret   = '6LceBVogAAAAAK4EeU7vHNrHYthyuo6VyewMetCf';
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $token . "&remoteip=" . $_SERVER['REMOTE_ADDR']
        );
        $response = json_decode($response);

        var_dump($response);
	}

}
