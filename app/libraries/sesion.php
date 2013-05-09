<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion  {
	 protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->helper('url');
        $this->ci->load->library("session");
	}

	public function set_sesion()
	{
		if ($this->ci->session->userdata('logged_in')) {
		return true;
		}else{
			$data['session']="session experid";
			$this->ci->load->view('base/head');
			$this->ci->load->view('sesion/out');
			$this->ci->load->view('base/footer');
			return false;
		}
	}

}

/* End of file sesion.php */
/* Location: ./application/controllers/sesion.php */
?>