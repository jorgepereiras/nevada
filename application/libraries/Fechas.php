<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Fechas {

/*
******************  Función para convertir una fecha a formato
******************  Octubre 27, 2011 y 20:18 hrs
******************
******************
*/
   public function converfecha($fecha)
	 {
		$f = explode(" ", $fecha);
		$fcal = explode("-", $fecha);
		
		$mes = $this->convermes($fcal[1]);
		
		$fecha_nota = $fcal[2].' '.$mes;
		return $fecha_nota;
	}

	public function fechalatin($fecha)
	 {
		$fcal = explode("-", $fecha);
		$fecha_nota = $fcal[2].'-'.$fcal[1].'-'.$fcal[0];
		return $fecha_nota;
	}
	
	public function convermes($mes)
	{
		$m = '';
		switch ($mes) {
			case '01':
				$m = 'ENERO';
				break;
			case '02':
				$m = 'FEBRERO';
				break;
			case '03':
				$m = 'MARZO';
				break;
			case '04':
				$m = 'ABRIL';
				break;
			case '05':
				$m = 'MAYO';
				break;
			case '06':
				$m = 'JUNIO';
				break;
			case '07':
				$m = 'JULIO';
				break;
			case '08':
				$m = 'AGOSTO';
				break;
			case '09':
				$m = 'SEPTIEMBRE';
				break;
			case '10':
				$m = 'OCTUBRE';
				break;
			case '11':
				$m = 'NOVIEMBRE';
				break;
			case '12':
				$m = 'DICIEMBRE';
				break;
		}
		return $m;
	}
	
}