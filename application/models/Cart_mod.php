<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);

/**
 * @author Rodrigo Romero
 * @version 2.0.0
 *
 */



class cart_mod extends RR_Model {
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
	   # $this->load->model('eventos_mod','Evento');
	   # $this->load->model('email_mod','Email');
	   # $this->load->model('payments_mod','MP');
		$this->load->library('cart');

	}


	public function add($sku='',$name='',$price='',$qty='', $modal=true) {
		$this->cart->destroy();
		$options = [];

		$name  = ($name) ? $name : filter_input(INPUT_POST,'ticket_name');
		$price = ($price) ? $price : filter_input(INPUT_POST,'ticket_ammount');



		try{
			$qty   =  ($qty) ? $qty : filter_input(INPUT_POST,'quantity');
			if(empty($qty) || $qty == 0 ){
				throw new Exception("Por favor seleccione la cantidad de entradas deseadas.",1);
			};

			$sku   = ($sku) ? $sku : filter_input(INPUT_POST,'sku');
			if(empty($sku)){
				throw new Exception("Se ha producido un error al agregar al carrito, por favor intentelo nuevamente mas tarde.",1);
			};

			$ticket = $this->validateSKU($sku);
			if($ticket == null){
				throw new Exception("Se ha producido un error al agregar al carrito, por favor intentelo nuevamente mas tarde.",1);
			};

			if($ticket->agotadas){
				throw new Exception("Se ha producido un error al agregar al carrito, por favor intentelo nuevamente mas tarde.",1);
			}

			if($ticket->min_qty == 0  && $ticket->max_qty == 0 ){
				$options['nominar'] = $qty;
			} elseif($ticket->min_qty>0 && $ticket->max_qty == 0 ) {
				$options['nominar'] = $qty;
				$qty = $qty/$ticket->min_qty;

			} elseif($ticket->min_qty>0 && $ticket->max_qty > 0 ) {
				  $options['nominar'] = $qty;
			}

			$options['extras']    = (!empty($ticket->descripcion)) ? $ticket->descripcion : '';
			$options['ticket_id'] = (!empty($ticket->id)) ? $ticket->id : '';

			$price = (int)$this->getPrice($ticket);

			$product = array(
				   'id'      => $sku,
				   'qty'     => $qty,
				   'price'   => $price,
				   'name'    => $ticket->nombre,
				   'options' => $options
				);

			$cart_product_id = $this->cart->insert($product);


			if($cart_product_id){
				if($modal){

					$success      = true;
					$responseType = 'function';
					$function     = 'showNotify';
					$message = 'La entrada seleccionada se ha agregado exitosamente. <a href="'.base_url('cart/checkout').'">Click aqui</> para completar la inscripción;';
					$components   = ['position'=> 'bottom-full-width', 'type'=> 'success', 'message'=>$message, 'time'=>5000, 'close'=>true];
					$data = array('success' =>$success,'responseType'=>$responseType, 'response'=>$components, 'value'=>$function);
				} else {
					return $cart_product_id;
				}
			} else {
				throw new Exception("Se ha producido un error al agregar al carrito, por favor intentelo nuevamente mas tarde.",1);
			}

		}
		catch(Exception $error)
		{
			#TODO LOG
			$error_code_id = $error->getCode();
			$message = $this->error_codes[$error_code_id];
			$success      = true;
			$responseType = 'function';
			$function     = 'showNotify';
			$components   = ['position'=> 'bottom-full-width', 'type'=> 'error', 'message'=>$error->getMessage(), 'time'=>5000, 'close'=>true];
			$data = array('success' =>$success,'responseType'=>$responseType, 'response'=>$components, 'value'=>$function);

		}

		return $data;


	}


	private function getPrice($ticket){
		$current_date = strtotime($this->today);


		if(strtotime($ticket->fecha_baja) >= strtotime("+1 day", $current_date)){
			return $ticket->precio_oferta;
		} else {
			return $ticket->precio_regular;
		}

	}

	private function validateSKU($sku){
		return $this->db->get_where('tickets',array('sku'=>$sku, 'evento_id'=>$this->evento->id))->row();
	}

/*




	public function add($sku='',$name='',$price='',$qty='', $modal=true){

		$options = [];
		$sku   = ($sku) ? $sku : filter_input(INPUT_POST,'ticket_sku');
		$name  = ($name) ? $name : filter_input(INPUT_POST,'ticket_name');
		$price = ($price) ? $price : filter_input(INPUT_POST,'ticket_ammount');
		$qty   =  ($qty) ? $qty : filter_input(INPUT_POST,'ticket_qty');
		$ticket = $this->validateSKU($sku);



		if($ticket->min_qty == 0  && $ticket->max_qty == 0 ){
			$options['nominar'] = $qty;
		} elseif($ticket->min_qty>0 && $ticket->max_qty == 0 ) {
			$options['nominar'] = $qty;
			$qty = $qty/$ticket->min_qty;

		} elseif($ticket->min_qty>0 && $ticket->max_qty > 0 ) {
			  $options['nominar'] = $qty;
		}


		if($ticket->precio_regular == $price || $ticket->precio_oferta == $price) {
			$options['extras'] = (!empty($ticket->descripcion)) ? $ticket->descripcion : '';
			$options['ticket_id'] = (!empty($ticket->id)) ? $ticket->id : '';

			$data = array(
				   'id'      => $sku,
				   'qty'     => $qty,
				   'price'   => (int)$price,
				   'name'    => $name,
				   'options' => $options
				);




			$cart_product_id = $this->cart->insert($data);

			if($cart_product_id){
				if($modal){
					$success = true;
					$responseType = 'function';
					$function     = 'appendFormMessagesModal';
					$messages     = $this->view('alerts/seleccion_entrada', array('ticket'=>$ticket->nombre, 'ammount'=>$price, 'title'=>$this->evento_name, 'class_type'=>'info'));
					$data = array('success' =>$success,'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function, 'modal_redirect'=>lang_url('cart/checkout'));
				} else {
					return $cart_product_id;
				}
			}
		} else {

		}

		return $data;
	}



	public function update($rowId, $value){
		$data = array(
				'rowid' => $rowId,
				'qty'   => $value,
			);

		if($this->cart->update($data) && count($this->cart->contents())>0){
			$success     = true;
			$responseType = 'function';
			$function = 'reloadCart';
			$html = $this->view('pagos/cart', array('param'=>'checkout'));
			$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$html,  'value'=>$function);

		} else {
			$success     = true;
			$responseType = 'function';
			$function     = 'appendFormMessagesModal';
			$messages     = $this->view('alerts/modal_alerts', array('texto'=>'<li>No posee articulos seleccionados</li>', 'title'=>$this->evento_name, 'class_type'=>'info'));
			$data = array('success' =>$success,'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function, 'modal_redirect'=>lang_url(''));
		}
		 return $data;

	}


	public function addCupon($c,$ammount,$description){
		$data = array(
				   'id'      => 'code_'.$c,
				   'qty'     => 1,
				   'price'   => $ammount,
				   'name'    => $description,
				   'options' => array('code'=>$c)
				);
		return $this->cart->insert($data);
	}


	public function addExtras(){
		$almuerzo_sku    = filter_input(INPUT_POST,'ticket_sku');
		$almuerzo_nombre = filter_input(INPUT_POST,'ticket_name');
		$almuerzo_price  = filter_input(INPUT_POST,'ticket_ammount');

		$data = array(
				   'id'      => $almuerzo_sku,
				   'qty'     => 1,
				   'price'   => $almuerzo_price,
				   'name'    => $almuerzo_nombre,
				   'options' => array()
				);


		if($this->cart->insert($data)){
			$success     = true;
			$responseType = 'function';
			$function = 'reloadCart';
			$html = $this->view('pagos/cart', array('param'=>'checkout'));
			$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$html,  'value'=>$function);
			return $data;
		}
	}


	public function set_gateway(){
		#VALIDO FORM POR PHP
		$success = 'false';
		$config = array();
		$config[1] = array('field'=>'medio_pago', 'label'=>'Medio de Pago', 'rules'=>'trim|required|xss_clean');
		$this->form_validation->set_rules($config);
		if($this->form_validation->run()==FALSE){
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			$responseType = 'function';
			$function     = 'appendFormMessagesModal';
			$messages     = $this->view('alerts/modal_alerts',array('texto'=>validation_errors(), 'title'=>'Formulario de Contacto', 'class_type'=>'error'));
			$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
		} else {
			$medio_pago = filter_input(INPUT_POST,'medio_pago');

			if($medio_pago){
				$this->session->set_userdata('cart_medio_pago',$medio_pago);
				$success = true;
				$responseType = 'function';
				$function     = 'appendFormMessagesModal';
				$messages     = $this->view('alerts/seleccion_gateway', array('medio_pago'=>ucwords(str_replace("_"," ",$medio_pago)), 'title'=>$this->evento_name, 'class_type'=>'info'));
				$data = array('success' =>$success,'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function, 'modal_redirect'=>lang_url('account/create'));
			}
		}

		return $data;
	}

	public function restoreCart($security){


		$user = $this->db->select('o.*, p.status payment_status', false)
						 ->where('o.status =',1)
						 ->where('o.salt =',$security)
						 ->join('pagos p', 'p.order_id = o.id','LEFT')
						 ->from('orders o')
						 ->get();
		$values = $user->row();

		switch($values->payment_status){
			case 'approved':
				$module = $this->view('pagos/payment_status', array('user_info'=>$values, 'message'=>'Su Pago ya se encuentra acreditado'));
				break;

			case 'in progress':
			case 'in_process':
				$module = $this->view('pagos/payment_status', array('user_info'=>$values, 'message'=>'Su Pago se encuentra en proceso de revisi�n'));
				break;

			default:
				$this->cart->destroy();
				#ABRO EL CART
				$cart = json_decode($values->full_cart);

				#GUARDO EL SALT USUARIO
				$this->session->set_userdata('cart_id',$values->id);
				$this->session->set_userdata('cart_salt',$security);
				$this->session->set_userdata('cart_cupon',$values->discount_code);

				foreach ($cart as $key => $row) {
					unset($row->rowid);
					$this->cart->insert(json_decode(json_encode($row),true));
				}
				if($this->cart->contents()>0){
				   return true;
				}
				break;

		}



		return array('payment_status'=>$values->payment_status, 'module'=>$module);





	}


	public function getOrderById(){

		$this->db->select('o.*, p.*, c.*', false)
				 ->from('orders o')
				 ->where('o.id', $this->session->userdata('cart_order'))
				 ->join('pagos p', 'p.order_id = o.id','INNER')
				 ->join('customers c', 'c.id = o.customer_id','INNER');
		$order = $this->db->get()->row();


		return array('order'=>$order);
	}


	*/

}
