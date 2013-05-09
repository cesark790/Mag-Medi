<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function login_in($usuario,$password)
	{
		$this->db->select("CONCAT(nombre, ' ', ap_pat) AS nombre,id_user", FALSE)
						->where(array('user_name'=>$usuario,'pass' => $password))
						->limit(1);
		$query = $this->db->get('users');
		return $query->row();
	}
		
	public function login_group($id)
	{
		$query = $this->db->query("SELECT (SELECT name FROM groups WHERE id = group_id) as name FROM users_groups WHERE user_id = $id ");
		return $query->row();
	}
}
