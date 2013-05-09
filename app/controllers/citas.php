<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		(!$this->session->userdata('username')) ? redirect('/login/', 'refresh') : ($this->session->userdata('group')!='enfer') ? redirect('/login/', 'refresh') : null;
		$this->load->library("estilos");
		$this->load->model('citas_model');
	}

	public function index()
	{			
		$data['titulo'] = ":.: Panel Citas :.:";
		$data['estilos'] = array(array('estilos'=> $this->estilos->get_css('normalize.css')),array("estilos" => $this->estilos->get_css("citas.css") ),array('estilos' =>  $this->estilos->get_css("cupertino/jquery-ui.css")),array('estilos' =>  $this->estilos->get_css("lib/bootstrap.css")),array('estilos' =>  $this->estilos->get_css("boo-extension.css")),array('estilos' =>  $this->estilos->get_css("boo.css")),array('estilos' =>  $this->estilos->get_css("style.css")),array('estilos' =>  $this->estilos->get_css("boo-coloring.css")),array('estilos' =>  $this->estilos->get_css("boo-utility.css")));
		$data['js'] = array(array('js'=> $this->estilos->get_js('jquery-1.9.1.js') ),array('js'=> $this->estilos->get_js('prefixfree.min.js')),array('js' =>  $this->estilos->get_js('jquery-ui-1.10.2.min.js')));
		$this->load->view("base/head",$data);
		$index['usuario'] = $this->session->userdata("username");
		$this->load->view("citas/nav",$index);
		$this->load->view("citas/index",$index);
	}

	//Consultas
	public function get_consultas()
	{
		$date = $this->input->post("date");
		$fecha_inicio = fechamysql($date)." 00:00:00";
		$fecha_fin = fechamysql($date)." 23:59:59";
		$data = $this->citas_model->get_consultas($fecha_inicio,$fecha_fin);
		echo json_encode($data);
	}
	//Citas
	public function get_citas()
	{
		$date = $this->input->post("date");
		$fecha_inicio = fechamysql($date)." 00:00:00";
		$fecha_fin = fechamysql($date)." 23:59:59";
		$data = $this->citas_model->get_citas($fecha_inicio,$fecha_fin);
		echo json_encode($data);
	}

	//Notas
	public function get_notas()
	{
		$date = $this->input->post("date");
		$id_user = $this->session->userdata('id_user');
		$fecha_inicio = fechamysql($date)." 00:00:00";
		$fecha_fin = fechamysql($date)." 23:59:59";
		$data = $this->citas_model->get_notas($fecha_inicio,$fecha_fin,$id_user);
		echo json_encode($data);
	}

	function change_date()
	{
		$date = $this->input->get('fecha');
		echo json_encode(fechaletra($date));
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */