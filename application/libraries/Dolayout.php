<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Dolayout {

    public function navbar()
    {
    	$ci =& get_instance();
        $data = array(
            'DIR'=>base_url()
            );
        if($ci->session->userdata('logged')==TRUE){
            $data['USERLOGGED'] = 'Logueado como <b>'.$ci->session->userdata('username').'</b> | <a href="'.base_url().'login/logout">Salir</a>';
        } else {
            $data['USERLOGGED'] = '';
        }
    	$navbar = $ci->parser->parse('layout/navbar', $data, TRUE);
    	return $navbar;
    }

    public function footer()
    {
    	return '';
    }

}
