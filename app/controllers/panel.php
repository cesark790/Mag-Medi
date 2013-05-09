<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		(!$this->session->userdata('username')) ? redirect('/login/', 'refresh') : ($this->session->userdata('group')!='admin') ? redirect('/login/', 'refresh') : null;
		$this->load->library("estilos");
		$this->load->model('sadmin');
	}

	public function index()
	{			
		$data['titulo'] = ":.: Panel Super User :.:";
		$data['estilos'] = array(array('estilos'=> $this->estilos->get_css('normalize.css')),array("estilos" => $this->estilos->get_css("superadmin.css") ));
		$data['js'] = array(array('js'=>  $this->estilos->get_js('jquery-1.9.1.js') ),array('js'=> $this->estilos->get_js('prefixfree.min.js')));
		$this->load->view("base/head",$data);
		$index['usuario'] = $this->session->userdata("username");
		$this->load->view("superadmin/nav",$index);
		$this->load->view("superadmin/index",$index);
	}

	public function get_users()
	{
		$data['json'] = $users = $this->sadmin->get_users();
		//$data['json'] = array(array('nombre' => 'julio','edad' => 20),array('nombre'=> 'cesar' , 'edad' => 30));
		$this->load->view("base/json",$data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */