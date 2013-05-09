<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
		if ($this->session->userdata('username')) 
		{
			switch ($this->session->userdata('group')) 
			{
				case 'admin':
					redirect('/panel/', 'location');
					break;
				case 'enfer':
					redirect('/agenda-auxiliar/'.date("d-m-Y	"), 'location');
					break;
				case 'doc':
					redirect('/agenda/', 'location');
					break;
				case 'secre':
					redirect('/citar/', 'location');
					break;
				default:
					redirect('/', 'refresh');
					break;
			}
		}

		$this->load->library('estilos');
		$data['estilos'] = array(array('estilos'=> $this->estilos->get_css('normalize.css')),array('estilos'=> $this->estilos->get_css('formulario-login.css')),array('estilos'=> $this->estilos->get_css('boo-extension.css')));
		$data['titulo'] = ":-Login-;";
		$data['js'] = array(array('js'=>  $this->estilos->get_js('jquery-1.9.1.js') ),array('js' => $this->estilos->get_js('login.js')));
		$data['url_server'] =  $this->config->base_url();
		$this->load->view('base/head',$data);
		$this->load->view('login/formuluario');
		$this->load->view('base/footer');
	}

	public function verificacion(){
		sleep(2);
		$username = $this->input->post('usuario');
		$password = $this->input->post('password');
		if ($username=="" or $password=="") 
		{
			echo "vacio";
			return false;
		}

		$this->load->model('login_model');
		$datos = $this->login_model->login_in($username,$password);
		if (!$datos) 
		{
		 	echo "no";
		 	return false;
		}
		$group = $this->login_model->login_group($datos->id_user);
		$newdata = array(
					'id_user' => $datos->id_user,
                   'username'  => $datos->nombre,
                   'group' => $group->name,
                   'logged_in' => TRUE
               );

		$this->session->set_userdata($newdata);
		echo "si";

	}

	public function destroy()
	{
			$this->session->sess_destroy();
			redirect("/" ,"location");
	}

	public function jeson()
	{
	$nombres = array('id' => "uno" ,'name' => "two");
	 print json_encode($nombres);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */