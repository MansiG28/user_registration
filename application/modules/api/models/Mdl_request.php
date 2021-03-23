<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_request extends MY_Model{

	public function __construct(){
		parent::__construct();
	}

	function get_usersrecords() {

		#check username and password form manpower data
		$this->db->select('ut.users_id, ut.message, u.users_fname, u.users_lname,u.users_email_id');
		$this->db->from('user_tickets ut');
		$this->db->join('users u', 'u.users_id = ut.users_id');
		$query = $this->db->get();

		$collection = $query->result();
		return $collection;
	}
}	
