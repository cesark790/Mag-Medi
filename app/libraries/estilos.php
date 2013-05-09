<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estilos 
{
  protected 	$ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->helper('url');
	}


	public function get_css($css)
	{
		$this->css = $css;
		$css = '<link rel="stylesheet" href="'.base_url('css/'.$css).'">';
		return $css;
	}

	public function get_js($js){
		$this->js = $js;
		$js = '<script src="'.base_url('js/'.$js).'"></script>';
		return $js;
	}
	

}

/* End of file estilos.php */
/* Location: .//C/xampp/htdocs/doc/app/libraries/estilos.php */