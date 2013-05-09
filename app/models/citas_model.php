<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citas_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	//Consultas
	public function get_consultas($fecha_inicio,$fecha_fin)
	{
		$query = $this->db->query("SELECT DATE_FORMAT(fecha_hora,'%H:%i') as hora,fecha_hora,concat(p.a_paterno,' ',p.a_materno,' ',p.nombre) as nombre FROM consultas c INNER JOIN pacientes p ON p.id_paciente = c.id_paciente WHERE fecha_hora BETWEEN '$fecha_inicio' and '$fecha_fin' ORDER BY fecha_hora ASC ");
		return $query->result_array();
	}

	//Citas
	public function get_citas($fecha_inicio,$fecha_fin)
	{
		$query = $this->db->query("SELECT DATE_FORMAT(fecha_hora,'%H:%i') as hora,fecha_hora,concat(p.a_paterno,' ',p.a_materno,' ',p.nombre) as nombre FROM citas c INNER JOIN pacientes p ON p.id_paciente = c.id_paciente WHERE fecha_hora BETWEEN '$fecha_inicio' and '$fecha_fin' ORDER BY fecha_hora ASC ");
		return $query->result_array();
	}

	// Notas
	public function get_notas($fecha_inicio,$fecha_fin,$id_user)
	{
		$sql = $this->db->query("SELECT DATE_FORMAT(fecha_hora,'%H:%i') as hora , nota_user FROM notas_user WHERE id_user = '$id_user' and fecha_hora BETWEEN '$fecha_inicio' and '$fecha_fin'  ORDER BY fecha_hora ASC ");
		return $sql->result_array();
	}

	//Pacientes
	public function set_paciente($nombre=NULL,$a_paterno=NULL,$a_materno=NULL,$f_nacimiento=NULL,$edad=NULL,$estatura=NULL,$peso=NULL,$sexo=NULL,$rfc=NULL,$curp=NULL,$ocupacion=NULL,$edo_civil=NULL,$tel_casa=NULL,$tel_movil=NULL,$tel_oficina=NULL,$tel_ext=NULL,$email=NULL,$calle_no=NULL,$col=NULL,$del=NULL,$edo=NULL,$pais=NULL,$cp=NULL,$antecedentes_pato=NULL,$antecendetes_nopato=NULL,$herefamiliares=NULL,$traumaticos=NULL,$esquema_inmonologicos=NULL,$tipo_sangre=NULL,$alergias=NULL,$intervenciones=NULL,$imc=NULL,$foto=NULL)
	{
		$datos = array(
								"nombre" => $nombre,
								"a_paterno" => $a_paterno,
								"a_materno" => $a_materno,
								"f_nacimiento" => $f_nacimiento,
								"edad" => $edad,
								"estatura" => $estatura,
								"peso" => $peso,
								"sexo" => $sexo,
								"rfc" => $rfc,
								"curp" => $curp,
								"ocupacion" => $ocupacion,
								"edo_civil" => $edo_civil,
								"tel_casa" => $tel_casa,
								"tel_movil" => $tel_movil,
								"tel_oficina" => $tel_oficina,
								"tel_ext" => $tel_ext,
								"email" => $email,
								"calle_no" => $calle_no,
								"col" => $col,
								"del" => $del,
								"edo" => $edo,
								"pais" => $pais,
								"cp" => $cp,
								"antecedentes_pato" => $antecedentes_pato,
								"antecendetes_nopato" => $antecendetes_nopato,
								"herefamiliares" => $herefamiliares,
								"traumaticos" => $traumaticos,
								"esquema_inmonologicos" => $esquema_inmonologicos,
								"tipo_sangre" => $tipo_sangre,
								"alergias" => $alergias,
								"intervenciones" => $intervenciones,
								"imc" => $imc,
								"foto" => $foto
						);
		$query = $this->db->insert('pacientes', $datos);
	}
}