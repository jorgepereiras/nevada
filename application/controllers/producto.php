<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct ();
		$this->load->library('cart');
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


	public function detalle($id=0)
	{
		$prod = $this->db->where('id', $id)
						->get('estilos')
						->row();
		$corrida = explode('/', $prod->corrida);
		$linea = $this->db->where('id', $prod->linea)
						->get('lineas')
						->row();
		if($prod->galeria != NULL)
		{
			$gal = json_decode($prod->galeria, true);
			$galeria = '';
			foreach($gal as $g => $valor)
			{
				$datagal['DIR'] = base_url();
				$datagal['ID'] = $prod->id;
				$datagal['VISTA'] = $valor;
				$galeria .= $this->parser->parse('productos/vista', $datagal, TRUE);
			}
		}
		else
		{
			$galeria = '';
		}
		$r = '';
		$rd = '';
		foreach ($this->cart->contents() as $items){
			$r .= $items['name'].'<br>';
			$rd .= $items['id'].'<br>';
		}
		
		$data = array(
			'DIR'		=> base_url(),
			'TITLE'		=> 'Nevada',
			'URL'		=> $this->uri->ruri_string(),
			'ID'		=> $prod->id,
			'LINEA'		=> $linea->linea,
			'ESTILO'	=> $prod->estilo,
			'VISTAS'	=> $galeria,
			'IMAGEN'	=> $prod->imagen,
			'CORTE'		=> $prod->corte,
			'COLOR'		=> $prod->color,
			'FORRO'		=> $prod->forro,
			'SUELA'		=> $prod->suela,
			'COLORSUELA' => $prod->colorsuela,
			'CORRIDA1'	=> $corrida[0],
			'CORRIDA2'	=> $corrida[1],
			'NEL'		=> $r.'<hr>',
			'NEL2'		=> '<br><br>ID:<br>'.$rd
			);
		$data['MAIN'] = $this->parser->parse('productos/detalle', $data, TRUE);
		$this->parser->parse('layout/site', $data);
	}

	public function add()
	{
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		$estilos = $this->db->where('id', $id)
					->get('estilos')
					->row();
		// $data = array(
  //              'id'      => $id,
  //              'name'    => $estilos->estilo.' '.$estilo->corte.' '.$estilo->color
  //           );
		$data = array(
               'id'      => $id,
               'qty'     => 1,
               'price'   => 39.95,
               'name'    => 'T-Shirt'.$estilos->estilo.' '.$estilos->corte.' '.$estilos->color,
               'options' => array('Size' => 'L', 'Color' => 'Red')
            );

		$this->cart->insert($data);
		redirect(base_url().$url);
	}


	public function todoterreno()
	{
		$data = array(
			'DIR'	=> base_url(),
			'TITLE'	=> 'Nevada'
			);
		$data['MAIN'] = $this->parser->parse('catalogo/allterreno', $data, TRUE);
		$this->parser->parse('layout/site', $data);
	}


	public function caballero()
	{
		$data = array(
			'DIR'	=> base_url(),
			'TITLE'	=> 'Nevada'
			);
		$items = '';
		foreach($this->getlistshoes(1) as $e)
		{
			$data['ID'] = $e->id;
			$data['ESTILO'] = $e->estilo;
			$data['CORTE'] = $e->corte;
			$data['COLOR'] = $e->color;
			$items .= $this->parser->parse('catalogo/item', $data, TRUE);
		}
		$data['ITEMS'] = $items;
		$data['MAIN'] = $this->parser->parse('catalogo/caballero', $data, TRUE);
		$this->parser->parse('layout/site', $data);
	}


	public function golosito()
	{
		$data = array(
			'DIR'	=> base_url(),
			'TITLE'	=> 'Nevada'
			);
		$data['MAIN'] = $this->parser->parse('catalogo/golosito', $data, TRUE);
		$this->parser->parse('layout/site', $data);
	}


	public function getlistshoes($id=0)
	{
		// Obtiene las líneas
		$lineas = $this->db->where('tipo', $id)
					->get('lineas')
						->result();
		foreach ($lineas as $l) {
			$li[] = $l->id;
		}
		
		// Recorre lineas y consulta sus estilos
		$estilos = $this->db->where_in('linea', $li)
						->get('estilos')
							->result();
		return $estilos;
	}

}