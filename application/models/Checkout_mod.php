<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);


class Checkout_mod extends RR_Model {

 	var $id;
    var $codeBar;
    private $payment_enabled;
    private $cupons_enabled;
    private $evento_name;

	public function __construct() {
		parent::__construct();

		$this->load->config('mp', TRUE);
        $mp_config = $this->config->item('mp');

        $this->load->library('mp', $mp_config);
        $this->mp->sandbox_mode(true);
	}





    public function getPreferences($values){


        $preference = array("items" => array(
                                             array("title"        => $this->evento->nombre,
                                                   "quantity"     => (int)1,
                                                   "currency_id"  => "ARS",
                                                   "unit_price"   => (int)$values['total'],
                                                   "picture_url"  => image_asset_url('logo_mp.jpg'),
                                                   "id"           => $values['id']
                                                   )
                                             ),

                           "payment_methods" => array('excluded_payment_types' => array (
                                                                                         array("id" => "debit_card"),
                                                                                         array("id" => "ticket" ),
                                                                                         array("id" => "bank_transfer"),
                                                                                         array("id" => "atm" )
                                                                                         ),
                                                       'installments' => 1
                                                      ),
                           "external_reference" => $values['id'].'-'.$values['barcode']
                           );

        $preferenceResult = $this->mp->create_preference($preference);
        $success      = true;
        $responseType = 'function';
        $function     = 'paymentLink';
        $messages     = $preferenceResult['response']['sandbox_init_point'];
        #$messages     = $preferenceResult['response']['init_point'];
        $data = array('success' => $success, 'responseType'=>$responseType, 'messages'=>$messages, 'value'=>$function);
        return $data;
    }



}
