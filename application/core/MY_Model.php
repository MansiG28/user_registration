<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct($table = '', $p_key = '', $alias = '') {
		parent::__construct();
	}

	
	function _insert($data, $table = '') {
		$table = (! empty($table)) ? $table : $this->get_table();
		$data['insert_dt'] = $data['update_dt'] = date('Y-m-d H:i:s');
		return ($this->db->insert($table, $data)) ? $this->db->insert_id() : FALSE;
	}

	function _update($conditions = [], $data, $table = '') {
		$table = (! empty($table)) ? $table : $this->get_table();
		$this->db->where($conditions);

		$data['update_dt'] = date('Y-m-d H:i:s');

		return $this->db->update($table, $data);
	}

	function get_records($filters = [], $table = '', $select = [], $order_by = '', $limit = 0, $offset = 0) {
		$table = (! empty($table)) ? $table : $this->get_table();

		if(sizeof($select) > 0){
			$this->db->select($select);
		}

		if(sizeof($filters) > 0){
            foreach($filters as $key => $filter) {
                if(! is_array($filter)) {
                    $this->db->where($key, $filter);
                } 
                
                if (is_array($filter) && count($filter)) {
                    $this->db->where_in($key, $filter);
                }
            }
		}

		if(!empty($order_by)){
			$this->db->order_by($order_by);
		}

		if(!empty($limit)) { $this->db->limit($limit, $offset); }

		$this->db->from($table);
		$query = $this->db->get();
		//echo $this->db->last_query(); die();
		return $query->result();
	}
}
