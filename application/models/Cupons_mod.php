<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);
/**
 * @author Rodrigo Romero
 * @version 1.0.0
 *
 */
class Cupons_mod extends RR_Model {
	public function __construct() {
		parent::__construct();
		$this->load->model('main_mod','Main');
		$this->load->model('cart_mod', 'Cart');
	}

		public function validate_cupon($c){

			try {

				if(empty($c)){
					throw new Exception("Debe ingresar un cupón válido",1);
				}

				$cupon = $this->getCupon($c);

				if(empty($cupon)){
					throw new Exception("Debe ingresar un cupón válido",1);
				}

				#VALIDO QUE QUEDEN CUPONES DISPONIBLES
				if($cupon->quantity < $cupon->available){
					throw new Exception("Debe ingresar un cupón válido",1);
				}

				#CALCULO EL % PARA EL DESCUENTO
				$ratio = ($cupon->value/100);

				$this->load->model('ticket_mod','Ticket');
				$ticket_cupon = $this->Ticket->getTicketById($cupon->plan_id);

				$not_apply = true;
				$discounted_price = 0;
				foreach($this->cart->contents() as $cart){
					if($cupon->plan_id == $cart['options']['ticket_id']){
						$not_apply = false;
						$discount  = ($ticket_cupon->precio_regular * $ratio)*-1;
						$new_price =  ($ticket_cupon->precio_regular + $discount);

						$hoy       = strtotime(date('Y-m-d'));
						$timelimit = strtotime($ticket_cupon->fecha_baja);

						#VALIDO SI APLICA PRECIO OFERTA O REGULAR y SI EL PRECIO REGULAR CON DESCUENTO QUEDA MENOR
						#QUE EL PRECIO OFERTA
						if( $hoy < $timelimit &&
							$new_price > $ticket_cupon->precio_oferta &&
							!empty($ticket_cupon->precio_oferta) ){
							throw new Exception("Debe ingresar un cupón válido - Cupón no válido para precios promocionales",1);
						}

						#SI EL DESCUENTO ES MAYOR AL PRECIO PROMOCIONAL - QUITO PRECIO PROMOCIONAL Y AGREGO EL REGULAR


						if($this->Cart->add($ticket_cupon->sku, $ticket_cupon->nombre,$ticket_cupon->precio_regular, false)){
							$description = 'Descuento '.$cupon->value.'% Tarifa Regular - '.$ticket_cupon->nombre;
							if($this->Cart->addCupon($cupon->code,$discount,$description)){
								$success     = true;
								$responseType = 'function';
								$function = 'reloadCart';
								$html = $this->view('pagos/cart', array('param'=>'checkout'));
								$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$html,  'value'=>$function);
								return $data;
							};
						}

						echo 'r - > '. $ratio;
						echo 'd - > '.$discount;
						echo 'np - > '.$new_price;

					}
				}

				if($not_apply){
					throw new Exception("Debe ingresar un cupón válido - Productos inválidos",1);
				}
				ep($cupon);



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

                /*


				$success      = true;
				$responseType = 'function';
				$function     = 'showNotify';
				$components   = ['position'=> 'bottom-full-width', 'type'=> 'error', 'message'=>$error->getMessage(), 'time'=>5000, 'close'=>true];
				$data = array('success' =>$success,'responseType'=>$responseType, 'response'=>$components, 'value'=>$function);
				*/
			}


			return $data;



/*


		if(!empty($c)){
			$cupon = $this->getCupon($c);
			#TODO VALIDAR DISTINTOS TIPOS DE TICKETS
			#TODO VALIDAR CANTIDADES
			if($cupon){
				$this->load->model('tickets_mod','Tickets');
				if($cupon->quantity>$cupon->available){
					$ratio = ($cupon->value/100);
					$ticket_cupon = $this->Tickets->getTicketById($cupon->plan_id);


					foreach($this->cart->contents() as $cart){


						if($cupon->plan_id == $cart['options']['ticket_id']){


							$discount  = ($ticket_cupon->precio_regular * $ratio)*-1;

							$new_price =  ($ticket_cupon->precio_regular + $discount);

							#VALIDO SI APLICA PRECIO OFERTA O REGULAR y SI EL PRECIO REGULAR CON DESCUENTO QUEDA MENOR
							#QUE EL PRECIO OFERTA
							$hoy       = strtotime(date('Y-m-d'));
							$timelimit = strtotime($ticket_cupon->fecha_baja);
							if($hoy<$timelimit && $new_price>$ticket_cupon->precio_oferta && !empty($ticket_cupon->precio_oferta) ){
								$success = 'false';
								$responseType = 'function';
								$function     = 'appendFormMessagesModal';
								$messages     = $this->view('alerts/modal_alerts',array('texto'=>'Cupón no válido para precios promocionales', 'title'=>'Cupones', 'class_type'=>'error'));
								$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
								return $data;
							} else {
								#TODO ARMAR ERROR NO ADD
								if($this->Cart->add($ticket_cupon->sku, $ticket_cupon->nombre,$ticket_cupon->precio_regular, false)){
									$description = 'Descuento '.$cupon->value.'% Tarifa Regular - '.$ticket_cupon->nombre;
									if($this->Cart->addCupon($cupon->code,$discount,$description)){
										$success     = true;
										$responseType = 'function';
										$function = 'reloadCart';
										$html = $this->view('pagos/cart', array('param'=>'checkout'));
										$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$html,  'value'=>$function);
										return $data;
									};
								}
							}


						} else {
							$success = 'false';
							$responseType = 'function';
							$function     = 'appendFormMessagesModal';
							$messages     = $this->view('alerts/modal_alerts',array('texto'=>'Cupón no válido para la entrada seleccionada.<br/>Para aplicar el cupon seleccionado tendrás que adquirir una entrada <b>'.$ticket_cupon->nombre.'</b', 'title'=>'Cupones', 'class_type'=>'error'));
							$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
							return $data;
						}





					};
				} else {
					$success = 'false';
					$responseType = 'function';
					$function     = 'appendFormMessagesModal';
					$messages     = $this->view('alerts/modal_alerts',array('texto'=>'Cupón no disponible', 'title'=>'Cupones', 'class_type'=>'error'));
					$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
					return $data;
				}
			} else {
				$success = 'false';
				$responseType = 'function';
				$function     = 'appendFormMessagesModal';
				$messages     = $this->view('alerts/modal_alerts',array('texto'=>'Cupón no disponible', 'title'=>'Cupones', 'class_type'=>'error'));
				$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$messages, 'value'=>$function);
				return $data;
			}

		} else {
			return false;
		}
		*/

		}

	private function getCupon($c){
		return $this->db->get_where('cupons', array('code'=>$c, 'evento_id'=>$this->evento->id))->row();
	}





	/*
	public function validate($c, $down=false){
		$validate = $this->db->get_where('cupons', array('status'=>1, 'code'=>$c))->row();
		if(count($validate)==1 && $down==true){
			$upd = $this->countDownCupons($validate->available,$c);
			if($upd){
				return $validate;
			}
		} else if ($down==false){
			return $validate;
		}
	}

	public function countDownCupons($available, $c){
		$this->db->where('code',$c);
		$upd = $this->db->update('cupons',array('available'=>$available+1));
		return $upd;
	}


	*/

}
