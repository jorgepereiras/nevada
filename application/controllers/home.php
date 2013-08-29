<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct ();
	}

	public function index()
	{
		$data = array(
			'DIR'	=> base_url(),
			'TITLE'	=> 'Nevada'
			);
		$data['MAIN'] = $this->parser->parse('home/home', $data, TRUE);
		$this->parser->parse('layout/site', $data);
	}

	public function todoterreno()
	{
		$data = array(
			'DIR'	=> base_url(),
			);
		$this->parser->parse('layout/navint', $data);
		$this->parser->parse('home/todoterreno', $data);
	}

	public function caballero()
	{
		$data['DIR'] = base_url();
		$this->parser->parse('layout/navint', $data);
		$this->parser->parse('home/caballero', $data);
	}

	public function nino()
	{
		$data = array(
			'DIR'	=> base_url(),
			);
		$this->parser->parse('layout/navint', $data);
		$this->parser->parse('home/nino', $data);
	}

	

	public function send()
	{
		$datos=array(
			'nombre' => $this->input->post('nombre'),
			'telefono' => $this->input->post('telefono'),
			'email' => $this->input->post('email'),
			'ciudad' => $this->input->post('ciudad'),
			'comentarios' => $this->input->post('comentarios'),
			'fecha' => date('Y-m-d h:i:s')
		);
		// if($this->db->insert('comentarios', $datos)){
			/** Envía correo electrónico **/
			$mensaje = array(
				'DIR'		=> site_url(),
				'ASUNTO' 	=> 'Se han enviado comentarios desde la web.',
				'MSG' 		=> '<p>Esta es la información que capturó el usuario</p>
								<ul>
									<li><b>Nombre: </b>'.$this->input->post('nombre').'</li>
									<li><b>Teléfono: </b>'.$this->input->post('telefono').'</li>
									<li><b>Email: </b>'.$this->input->post('email').'</li>
									<li><b>Ciudad: </b>'.$this->input->post('ciudad').'</li>
									<li><b>Comentarios: </b>'.$this->input->post('comentarios').'</li>
								</ul>'
				);
			$msg = $this->parser->parse('plantilla-mail', $mensaje, TRUE);

			$mail = 'direccion@ackerman.com.mx';
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from($this->input->post('email'), $this->input->post('nombre'));
			$this->email->to($mail);
			$this->email->bcc('grupoquimaira@gmail.com');
			$this->email->subject('Notificación de comentarios enviados');
			$this->email->message($msg);
			$this->email->send();
			/***/
			// $this->session->set_flashdata('mensaje', 'Tus comentarios se han enviado exitosamente.');
			redirect('');
		// } else {
			// $this->session->set_flashdata('mensaje', 'Hubo un problema con el envío de tus datos, inténtalo nuevamente.');
			// redirect('contacto');
		// }
	}	
}