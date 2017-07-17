<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);

/**
 * @author Rodrigo Romero
 * @version 2.0.0
 *
 */


class account_mod extends RR_Model {
	#private $payment_enabled;
	#private $cupons_enabled;

	private $error_codes = [
		1 => 'Sku inválido',
		2 => 'Missing Customer',
		3 => 'Missing Discount Code',
		4 => 'Code Not Exists',
		5 => 'Missing Price Rule',
		6 => 'Not Valid Customer - Cupon Applies Customers Created Before a Date',
		7 => 'Products in cart are not valid for this order',
		8 => 'Discount Code Expired',
		9 => 'Discount Code Not Started Yet',
		10 => 'Discount Code Usage Limit Reached',
		11 => 'Discount Code has already been used',
		12 => 'Customer Not in Saved Search',
		13 => 'Discount Code Minimun Amount Requerid',
		14 => 'Missing Allocation Method',
		15 => 'Missing Shipping Line',
		16 => 'Not Valid Customer - Cupon Applies Customers 1st Purchase'
	];

	public function __construct() {
		parent::__construct();
	}

	public function create(){
		$success = 'false';
		$config = array();
		$config[1] = array('field'=>'empresa', 'label'=>'Empresa', 'rules'=>'trim|required');
		$config[2] = array('field'=>'cargo', 'label'=>'Cargo', 'rules'=>'trim|required');
		$config[3] = array('field'=>'email', 'label'=>'Email', 'rules'=>'trim|required|valid_email|is_unique[customers.email]');
		$config[4] = array('field'=>'nombre', 'label'=>'Nombre', 'rules'=>'trim|required');
		$config[5] = array('field'=>'apellido', 'label'=>'Apellido', 'rules'=>'trim|required');
		$config[6] = array('field'=>'password', 'label'=>'Password', 'rules'=>'trim|required');

		$this->form_validation->set_rules($config);

		try {
			if($this->form_validation->run()==FALSE){
				$this->form_validation->set_error_delimiters('', '<br/>');
				$errors = validation_errors();
				throw new Exception($errors, 1);
			}

			$customer = ['empresa' => filter_input(INPUT_POST,'empresa'),
						 'cargo' => filter_input(INPUT_POST,'cargo'),
						 'nombre' => filter_input(INPUT_POST,'nombre'),
						 'apellido' => filter_input(INPUT_POST,'apellido'),
						 'email' => filter_input(INPUT_POST,'email'),
						 'password' => md5(filter_input(INPUT_POST,'password')),
						 'newsletter' => 1
						];

			$values  = array_merge($customer, $this->i);
			$insert = $this->db->insert('customers', $values);
			if($insert){
				$success = 'true';
	            $responseType = 'function';
	            $function     = 'appendFormMessagesModal';
	            $messages     = $this->view('alerts/modal_alert',
	            	['texto'=> "Su cuenta ha sido creada exitosamente",
	            	 'title'=>'Registro de Usuarios',
	            	 'class_type'=>'error']);
	            $data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
			}



		} catch (Exception $error) {
			$error_code_id = $error->getCode();
			$message = $this->error_codes[$error_code_id];

			$success = 'false';
            $responseType = 'function';
            $function     = 'appendFormMessagesModal';
            $messages     = $this->view('alerts/modal_alert',
            	['texto'=> $error->getMessage(),
            	 'title'=>'Cupones',
            	 'class_type'=>'error']);
            $data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);

		}

		return $data;

	}


	public function update($id){
		$success = 'false';
		$config = array();
		$config[1] = array('field'=>'empresa', 'label'=>'Empresa', 'rules'=>'trim|required');
		$config[2] = array('field'=>'cargo', 'label'=>'Cargo', 'rules'=>'trim|required');
		$config[3] = array('field'=>'email', 'label'=>'Email', 'rules'=>'trim|required|valid_email');
		$config[4] = array('field'=>'nombre', 'label'=>'Nombre', 'rules'=>'trim|required');
		$config[5] = array('field'=>'apellido', 'label'=>'Apellido', 'rules'=>'trim|required');

		$this->form_validation->set_rules($config);

		try {
			if($this->form_validation->run()==FALSE){
				$this->form_validation->set_error_delimiters('', '<br/>');
				$errors = validation_errors();
				throw new Exception($errors, 1);
			}

			$newsletter = (filter_input(INPUT_POST,'newsletter') == 'on') ? 1 : 0;
			$fecha_nacimiento = explode("-", filter_input(INPUT_POST,'fecha_nacimiento'));
			$fecha_nacimiento = $fecha_nacimiento[2].'-'.$fecha_nacimiento[1].'-'.$fecha_nacimiento[0];

			$customer = ['empresa' => filter_input(INPUT_POST,'empresa'),
						 'cargo' => filter_input(INPUT_POST,'cargo'),
						 'nombre' => filter_input(INPUT_POST,'nombre'),
						 'apellido' => filter_input(INPUT_POST,'apellido'),
						 'email' => filter_input(INPUT_POST,'email'),
						 'fecha_nacimiento' => empty($fecha_nacimiento) ? null : $fecha_nacimiento,
						 'dni' => filter_input(INPUT_POST,'dni'),
						 'telefono' => filter_input(INPUT_POST,'telefono'),
						 'conocio' => filter_input(INPUT_POST,'conocio'),
						 'newsletter' => $newsletter
						];


			$values  = array_merge($customer, $this->u);
			$this->db->where('id', $id);
			$update = $this->db->update('customers', $values);
			if($update){
				$success = 'true';
	            $responseType = 'function';
	            $function     = 'appendFormMessagesModal';
	            $messages     = $this->view('alerts/modal_alert',
	            	['texto'=> "Su cuenta ha sido actualizada exitosamente",
	            	 'title'=>'Registro de Usuarios',
	            	 'class_type'=>'error']);
	            $data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
			}



		} catch (Exception $error) {
			$error_code_id = $error->getCode();
			$message = $this->error_codes[$error_code_id];

			$success = 'false';
            $responseType = 'function';
            $function     = 'appendFormMessagesModal';
            $messages     = $this->view('alerts/modal_alert',
            	['texto'=> $error->getMessage(),
            	 'title'=>'Cupones',
            	 'class_type'=>'error']);
            $data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);

		}

		return $data;

	}



	public function getCustomerById(){
		$customer = $this->db->get_where('customers', ['id'=>get_session('id', false)])->row();

		return $customer;
	}


	public function getOrdersByCustomerById(){
		$grouped_orders = [];

		$order_event = $this->db->select('e.*')
							    ->group_by('o.evento_id')
							    ->where('o.customer_id', get_session('id', false))
							    ->from('orders o')
							    ->join('eventos e', 'e.id = o.evento_id','INNER')
							    ->order_by('e.id',DESC)
							    ->get()
							    ->result();


		foreach($order_event as $event){



        $orders = $this->db->select('o.id, o.total_price, o.discount_amount, o.total_discounted_price, o.status, p.status payment_status', false)
        				   ->join('pagos p', 'p.order_id = o.id','INNER')
        				   ->where('o.customer_id',get_session('id', false))
        				   ->where('o.evento_id', $event->id)
        				   ->order_by('o.id','DESC')
        				   ->from('orders o')
        				   ->get()
        				   ->result();


   		$grouped_orders[$event->id]['name'] = $event->nombre;
		$grouped_orders[$event->id]['orders'] = $orders;





     	}

     	return $grouped_orders;

	}




}
