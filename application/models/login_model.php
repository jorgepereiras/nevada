<?php 

class Login_model extends Ci_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function checklogin()
    {
    	if($this->session->userdata('logged') == TRUE){
			return TRUE;
		} else{
			redirect('login');
		}
    }

    function checkperms($perm)
    {
    	$query = $this->db->where('id', $this->session->userdata('iduser'))
    			->get('qd_usuarios')
    			->row();
    	$p = json_decode($query->permisos);

    	foreach($p as $k){
    		if($k == $perm)
    			$ok = TRUE;
    	}
    	if(isset($ok))
    		return TRUE;
    	else
    		return FALSE;
    }


}