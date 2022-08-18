<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');



class event_mod extends RR_Model {

	public function __construct() {
		parent::__construct();
	}


	public function runtest(){
		$this->load->model('EmailSG_mod','Email');
		$body  = $this->view('email/reminder_two',array('user'=>$acreditado, 'evento'=>$this->evento));
		$email = $this->Email->send('email_info', "rodrigo.lolo.romero@gmail.com", $subject, $body);
		return $email;
	}

	public function getEventoById($id){
		$evento = $this->get_where('eventos',['id'=>$id])->row();
		return $evento;
	}

	public function _doReminder(){	
		$this->load->model('email_mod','Email');
		$subject     = "Link de acceso: ".$this->evento->nombre.' '.$this->evento->bajada;
		$reminder_one = strtotime($this->evento->reminder_one);
        	$reminder_two = strtotime($this->evento->reminder_two);
    		$fecha_evento = strtotime($this->evento->fecha_inicio);
    		$hoy          = strtotime(date('Y-m-d'));
		echo 'Hoy '.date('Y-m-d');
		echo ' Evento '.$this->evento->fecha_inicio;
		echo ' Reminder '.$this->evento->reminder_one;
		echo $this->evento->id;
		
		
 	
		if($hoy <= $fecha_evento){		
		
			if($hoy >= $reminder_one){
				 echo 'Reminder 1';
				$result = $this->db->get_where('acreditados',array('status'=>1,'reminder'=>0, 'evento_id' => $this->evento->id),50)->result();
				ep($result);
				die ('r1');
				foreach($result as $acreditado){
					$body  = $this->view('email/reminder_two',array('user'=>$acreditado, 'evento'=>$this->evento));
					$email = $this->Email->send('email_info', $acreditado->email, $subject, $body);
					
					if($email){
					$this->db->where('id',$acreditado->id);
						$this->db->update('acreditados', array('reminder'=>1));
						 echo $acreditado->id.' - OK';
						 echo br();
					} 
					
				}
			} elseif($hoy >= $reminder_two && $hoy < $fecha_evento){
				die ('r2');
				echo 'Reminder 2';
				//$result = $this->db->get_where('acreditados',array('status'=>1,'reminder'=>1, 'evento_id' => $this->evento->id),50)->result();
			
                		//foreach($result as $acreditado){
                        	//	$body  = $this->view('email/reminder_two',array('user'=>$acreditado, 'evento'=>$this->evento));
                        	//	$email = $this->Email->send('email_info', $acreditado->email, $subject, $body);
                        	//	if($email){
                                //		$this->db->where('id',$acreditado->id);
                                //		$this->db->update('acreditados', array('reminder'=>2));
                        	//	}
                		//}

			} else {
				die;
			 	echo 'Fecha NO Disponible';
			 	// $result = $this->db->where_in('id',[1120,1094,1219,1121,1122])->get_where('acreditados',array('reminder'=>1, 'evento_id' => $this->evento->id),50)->result();				
				
				 // foreach($result as $acreditado){
					// $body  = $this->view('email/reminder_two',array('user'=>$acreditado, 'evento'=>$this->evento));
					// #$email = $this->Email->send('email_info', $acreditado->email, $subject, $body);
					// if($email){
					// 	$this->db->where('id',$acreditado->id);
					// 	$this->db->update('acreditados', array('reminder'=>1));
					// 	echo $acreditado->id.' - OK';
					// 	echo br();
					// } else {
					// 	echo $acreditado->id.' - FAIL';
					// 	echo br();
					// }
					
				 // }
		
				
			}


		} else {
			echo 'No hay evento disponible';
		}
				
		return false;

	}
}
